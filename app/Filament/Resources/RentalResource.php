<?php

namespace App\Filament\Resources;

use App\Models\Rental;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\RentalResource\Pages;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;

class RentalResource extends Resource
{
    protected static ?string $model = Rental::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';

    protected static ?string $navigationGroup = 'Transaksi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('tool_id')
                ->relationship('tool', 'name')
                ->label('Alat')
                ->required(),

            TextInput::make('user_name')
                ->label('Penyewa')
                ->required(),

            DatePicker::make('start_date')
                ->label('Tanggal Mulai')
                ->required(),

            DatePicker::make('end_date')
                ->label('Tanggal Selesai')
                ->required(),

            TextInput::make('quantity')
                ->label('Jumlah')
                ->numeric()
                ->required(),

            Select::make('payment_status')
                ->options([
                    'paid' => 'Lunas',
                    'unpaid' => 'Belum Lunas',
                ])
                ->default('unpaid')
                ->label('Status Pembayaran')
                ->required(),

            Select::make('is_returned')
                ->label('Status Pengembalian')
                ->options([
                    false => 'Belum Dikembalikan',
                    true => 'Sudah Dikembalikan',
                ])
                ->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('tool.name')
                ->label('Alat'),

            TextColumn::make('user_name')
                ->label('Penyewa'),

            TextColumn::make('start_date')
                ->date()
                ->label('Mulai'),

            TextColumn::make('end_date')
                ->date()
                ->label('Selesai'),

            TextColumn::make('quantity')
                ->label('Jumlah'),

            TextColumn::make('total_price')
                ->money('IDR')
                ->label('Total'),

            BadgeColumn::make('payment_status')
                ->label('Pembayaran')
                ->formatStateUsing(fn (string $state): string => match ($state) {
                    'paid' => 'Lunas',
                    'unpaid' => 'Belum Lunas',
                    default => $state,
                })
                ->colors([
                    'success' => 'paid',
                    'danger' => 'unpaid',
                ]),

            BadgeColumn::make('is_returned')
                ->label('Pengembalian')
                ->formatStateUsing(fn (bool $state): string => $state ? 'Sudah Dikembalikan' : 'Belum Dikembalikan')
                ->colors([
                    'success' => true,
                    'warning' => false,
                ]),
        ])
        ->actions([
            Action::make('markPaid')
                ->label('Sudah Lunas')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation()
                ->visible(fn (Rental $record): bool => $record->payment_status !== 'paid')
                ->action(function (Rental $record) {
                    $record->payment_status = 'paid';
                    $record->save();
                }),

            Action::make('markReturned')
                ->label('Sudah Dikembalikan')
                ->icon('heroicon-o-arrow-uturn-left')
                ->color('primary')
                ->requiresConfirmation()
                ->visible(fn (Rental $record): bool => !$record->is_returned)
                ->action(function (Rental $record) {
                    $record->is_returned = true;
                    $record->save();

                    // Tambah stok alat
                    $tool = $record->tool;
                    $tool->stock += $record->quantity;
                    $tool->save();
                }),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRentals::route('/'),
            'create' => Pages\CreateRental::route('/create'),
            'edit' => Pages\EditRental::route('/{record}/edit'),
        ];
    }
}