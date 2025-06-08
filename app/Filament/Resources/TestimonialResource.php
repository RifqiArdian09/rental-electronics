<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $modelLabel = 'Testimoni';

    protected static ?string $pluralModelLabel = 'Semua Testimoni';

    protected static ?string $navigationGroup = 'Manajemen Konten';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('rental_id')
                    ->relationship(
                        name: 'rental',
                        titleAttribute: 'id',
                        modifyQueryUsing: fn (Builder $query) => $query->with('tool')
                    )
                    ->label('ID Penyewaan')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpan(1)
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        "Penyewaan #{$record->id} - {$record->tool->name}"),

                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Pelanggan')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpan(1),

                Forms\Components\Textarea::make('message')
                    ->label('Pesan Testimoni')
                    ->required()
                    ->maxLength(500)
                    ->columnSpanFull()
                    ->rows(5),

                Forms\Components\Select::make('rating')
                    ->label('Rating')
                    ->options([
                        '1' => '★☆☆☆☆ (Buruk)',
                        '2' => '★★☆☆☆ (Kurang)',
                        '3' => '★★★☆☆ (Cukup)',
                        '4' => '★★★★☆ (Puas)',
                        '5' => '★★★★★ (Sangat Puas)',
                    ])
                    ->required()
                    ->columnSpan(1),

                Forms\Components\Toggle::make('is_approved')
                    ->label('Disetujui')
                    ->default(true)
                    ->columnSpan(1)
                    ->onColor('success')
                    ->offColor('danger'),

                Forms\Components\DateTimePicker::make('created_at')
                    ->label('Dibuat Pada')
                    ->disabled()
                    ->displayFormat('d M Y H:i')
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('rental.tool.name')
                    ->label('Alat Disewa')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ->tooltip(fn ($record) => $record->rental->tool->name),

                Tables\Columns\TextColumn::make('message')
                    ->label('Testimoni')
                    ->limit(50)
                    ->searchable()
                    ->tooltip(fn ($record) => $record->message),

                Tables\Columns\IconColumn::make('rating')
                    ->label('Rating')
                    ->icon(fn (int $state): string => 'heroicon-o-star')
                    ->color(fn (int $state): string => match ($state) {
                        1, 2 => 'danger',
                        3 => 'warning',
                        4, 5 => 'success',
                    })
                    ->tooltip(fn (int $state): string => "$state bintang"),

                Tables\Columns\IconColumn::make('is_approved')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('rating')
                    ->label('Filter Rating')
                    ->options([
                        '1' => '1 Bintang',
                        '2' => '2 Bintang',
                        '3' => '3 Bintang',
                        '4' => '4 Bintang',
                        '5' => '5 Bintang',
                    ]),

                Tables\Filters\TernaryFilter::make('is_approved')
                    ->label('Status Persetujuan')
                    ->trueLabel('Disetujui')
                    ->falseLabel('Belum Disetujui'),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['until'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->tooltip('Edit Testimoni'),

                Tables\Actions\Action::make('approve')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->hidden(fn (Testimonial $record) => $record->is_approved)
                    ->action(fn (Testimonial $record) => $record->update(['is_approved' => true]))
                    ->tooltip('Setujui Testimoni')
                    ->successNotificationTitle('Testimoni telah disetujui'),

                Tables\Actions\Action::make('reject')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->visible(fn (Testimonial $record) => $record->is_approved)
                    ->action(fn (Testimonial $record) => $record->update(['is_approved' => false]))
                    ->tooltip('Tolak Testimoni')
                    ->successNotificationTitle('Testimoni telah ditolak'),

                Tables\Actions\ViewAction::make()
                    ->iconButton()
                    ->tooltip('Lihat Detail'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus yang Dipilih')
                        ->requiresConfirmation(),

                    Tables\Actions\BulkAction::make('approveSelected')
                        ->label('Setujui yang Dipilih')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->action(fn ($records) => $records->each->update(['is_approved' => true]))
                        ->requiresConfirmation(),

                    Tables\Actions\BulkAction::make('rejectSelected')
                        ->label('Tolak yang Dipilih')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->action(fn ($records) => $records->each->update(['is_approved' => false]))
                        ->requiresConfirmation(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Testimoni'),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RentalRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
            'view' => Pages\ViewTestimonial::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user', 'rental.tool']);
    }
}
