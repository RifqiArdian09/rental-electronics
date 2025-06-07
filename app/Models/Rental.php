<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'tool_id',
        'user_name',
        'start_date',
        'end_date',
        'payment_status',
        'total_price',
    ];

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }

    protected static function booted()
    {
        static::saving(function ($rental) {
            if ($rental->start_date && $rental->end_date && $rental->tool_id) {
                $tool = Tool::find($rental->tool_id);
                if ($tool) {
                    $days = Carbon::parse($rental->start_date)->diffInDays(Carbon::parse($rental->end_date)) + 1;
                    $rental->total_price = $days * $tool->price_per_day;
                }
            }
        });
    }
}
