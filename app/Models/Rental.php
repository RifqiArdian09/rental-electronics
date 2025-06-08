<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Tool;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'tool_id',
        'user_id',
        'user_name',
        'start_date',
        'end_date',
        'quantity',
        'catatan',
        'payment_status',
        'is_returned',
    ];

    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id');
    }

    protected static function booted()
    {
        static::saving(function ($rental) {
            if ($rental->start_date && $rental->end_date && $rental->tool_id && $rental->quantity) {
                $tool = Tool::find($rental->tool_id);
                if ($tool) {
                    $days = Carbon::parse($rental->start_date)->diffInDays(Carbon::parse($rental->end_date)) + 1;
                    $rental->total_price = $days * $tool->price_per_day * $rental->quantity;
                }
            }
        });
    }
    // Di dalam model Rental.php
public function hasTestimonial()
{
    return $this->testimonial()->exists();
}

public function testimonial()
{
    return $this->hasOne(Testimonial::class);
}
}
