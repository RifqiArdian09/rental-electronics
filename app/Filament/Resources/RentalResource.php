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

            Select::make('payment_status')
                ->options([
                    'paid' => 'Lunas',
                    'unpaid' => 'Belum Lunas',
                ])
                ->default('unpaid')
                ->label('Status Pembayaran')
                ->required(),
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
