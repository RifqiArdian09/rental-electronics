<?php

namespace App\Filament\Resources\TestimonialResource\Pages;

use Filament\Resources\Pages\ViewRecord;
use Filament\Forms;
use App\Filament\Resources\TestimonialResource;

class ViewTestimonial extends ViewRecord
{
    protected static string $resource = TestimonialResource::class;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('user.name')->label('Pelanggan')->disabled(),
            Forms\Components\TextInput::make('rental.tool.name')->label('Alat Disewa')->disabled(),
            Forms\Components\Textarea::make('message')->label('Pesan Testimoni')->disabled()->rows(5),
            Forms\Components\Select::make('rating')
                ->label('Rating')
                ->options([
                    '1' => '★☆☆☆☆ (Buruk)',
                    '2' => '★★☆☆☆ (Kurang)',
                    '3' => '★★★☆☆ (Cukup)',
                    '4' => '★★★★☆ (Puas)',
                    '5' => '★★★★★ (Sangat Puas)',
                ])
                ->disabled(),
            Forms\Components\Toggle::make('is_approved')->label('Disetujui')->disabled(),
            Forms\Components\DateTimePicker::make('created_at')->label('Dibuat Pada')->disabled()->displayFormat('d M Y H:i'),
        ];
    }
}
