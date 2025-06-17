<?php

namespace App\Filament\Resources;

use App\Models\Contact;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use App\Filament\Resources\ContactResource\Pages\ListContacts;
use App\Filament\Resources\ContactResource\Pages\ViewContact;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('message')
                    ->required(),

                Forms\Components\Textarea::make('reply')
                    ->label('Balasan Admin')
                    ->placeholder('Tulis balasan di sini...')
                    ->rows(5)
                    ->required(false)
                    ->disabled(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('subject')->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\IconColumn::make('reply')
                    ->label('Sudah Dibalas')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),

                // Reply via Email button
                Tables\Actions\Action::make('replyEmail')
                    ->label('Balas via Email')
                    ->icon('heroicon-o-envelope')
                    ->color('primary')
                    ->form([
                        Forms\Components\Textarea::make('original_message')
                            ->label('Pesan Asli')
                            ->default(fn ($record) => $record->message)
                            ->disabled()
                            ->rows(5),
                        Textarea::make('reply')
                            ->label('Tulis Balasan Email')
                            ->required()
                            ->rows(5),
                    ])
                    ->action(function ($record, array $data) {
                        $record->reply = $data['reply'];
                        $record->save();

                        Mail::to($record->email)->send(new ContactReplyMail($record));

                        Notification::make()
                            ->title('Balasan email berhasil dikirim')
                            ->success()
                            ->send();
                    }),


                // Reply via WhatsApp button
                Tables\Actions\Action::make('replyWhatsapp')
                ->label('Balas via WhatsApp')
                ->icon('heroicon-o-chat-bubble-left')
                ->color('success')
                ->form([
                    Forms\Components\Textarea::make('original_message')
                        ->label('Pesan Asli')
                        ->default(fn ($record) => $record->message)
                        ->disabled()
                        ->rows(5),
                    Textarea::make('reply')
                        ->label('Tulis Balasan WhatsApp')
                        ->required()
                        ->rows(5),
                ])
                ->action(function ($record, array $data) {
                    $record->reply = $data['reply'];
                    $record->save();

                    Notification::make()
                        ->title('Balasan berhasil disimpan')
                        ->success()
                        ->send();

                    $phone = preg_replace('/^0/', '62', $record->phone);
                    $original = urlencode($record->message);
                    $reply = urlencode($data['reply']);
                    $message = "Halo {$record->name},%0A%0ATerkait pesan Anda:%0A\"{$original}\"%0A%0ABalasan kami:%0A{$reply}";

                    $url = "https://wa.me/{$phone}?text={$message}";

                    return redirect($url);
                }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContacts::route('/'),
            'view' => ViewContact::route('/{record}'),
        ];
    }
}
