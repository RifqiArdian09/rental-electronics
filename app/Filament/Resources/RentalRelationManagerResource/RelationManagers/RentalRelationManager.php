<?php

namespace App\Filament\Resources\TestimonialResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class RentalRelationManager extends RelationManager
{
    protected static string $relationship = 'rental';

    protected static ?string $title = 'Data Penyewaan';

    protected static ?string $modelLabel = 'penyewaan';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('ID Penyewaan')
                    ->disabled(),
                    
                Forms\Components\TextInput::make('tool.name')
                    ->label('Alat yang Disewa')
                    ->disabled(),
                    
                Forms\Components\TextInput::make('start_date')
                    ->label('Tanggal Mulai')
                    ->date()
                    ->disabled(),
                    
                Forms\Components\TextInput::make('end_date')
                    ->label('Tanggal Selesai')
                    ->date()
                    ->disabled(),
                    
                Forms\Components\TextInput::make('total_price')
                    ->label('Total Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID Penyewaan')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('tool.name')
                    ->label('Alat')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Mulai')
                    ->date('d M Y'),
                    
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Selesai')
                    ->date('d M Y'),
                    
                Tables\Columns\TextColumn::make('total_price')
                    ->label('Total')
                    ->money('IDR'),
                    
                Tables\Columns\TextColumn::make('payment_status')
                    ->label('Status Pembayaran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('payment_status')
                    ->label('Status Pembayaran')
                    ->options([
                        'paid' => 'Lunas',
                        'pending' => 'Pending',
                        'failed' => 'Gagal',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->iconButton()
                    ->tooltip('Lihat Detail'),
            ])
            ->bulkActions([]);
    }
}