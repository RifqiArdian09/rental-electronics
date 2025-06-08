<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'user_id',
        'message',
        'rating',
        'is_approved',
    ];
    

    // Relasi ke Rental
    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    // Relasi ke Customer
    public function user()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }
    
}