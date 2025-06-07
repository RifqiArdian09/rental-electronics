<?php

namespace App\Filament\Resources;

use App\Models\Tool;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\ToolResource\Pages;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class ToolResource extends Resource
{
    protected static ?string $model = Tool::class;
    protected static ?string $navigationIcon = 'heroicon-s-cube';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $label = 'Alat';
    protected static ?string $pluralLabel = 'Daftar Alat';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->label('Nama Alat'),

                FileUpload::make('image')
                ->label('Gambar Alat')
                ->image()
                ->directory('tools')
                ->imagePreviewHeight('150')
                ->openable()
                ->downloadable()
                ->nullable()
                ->disk('public'), // PENTING!
            

            Select::make('category_id')
                ->relationship('category', 'name')
                ->required()
                ->label('Kategori'),

            TextInput::make('description')
                ->required()
                ->label('Deskripsi')
                ->maxLength(255),

            TextInput::make('stock')
                ->numeric()
                ->required()
                ->label('Stok'),

            TextInput::make('price_per_day')
                ->numeric()
                ->required()
                ->label('Harga / Hari (Rp)'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('image')
    ->label('Gambar')
    ->disk('public') // PENTING!
    ->height(50)
    ->circular(),


            TextColumn::make('name')
                ->label('Nama Alat')
                ->searchable(),

            TextColumn::make('category.name')
                ->label('Kategori'),
            
                TextColumn::make('description')
                ->label('Deskripsi')
                ->limit(50),

            TextColumn::make('stock')
                ->label('Stok'),

            TextColumn::make('price_per_day')
                ->money('IDR')
                ->label('Harga / Hari'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTools::route('/'),
            'create' => Pages\CreateTool::route('/create'),
            'edit' => Pages\EditTool::route('/{record}/edit'),
        ];
    }
}
