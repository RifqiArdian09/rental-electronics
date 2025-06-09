<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
        'name',
        'image',
        'category_id',
        'description',
        'stock',
        'price_per_day'
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke rental
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    // Relasi ke testimoni melalui rental
    public function testimonials()
    {
        return $this->hasManyThrough(
            Testimonial::class,
            Rental::class,
            'tool_id',     // Foreign key di rentals
            'rental_id',   // Foreign key di testimonials
            'id',          // Local key di tools
            'id'           // Local key di rentals
        );
    }

    // Akses untuk rating rata-rata dari testimoni
    public function getAverageRatingAttribute()
    {
        return $this->testimonials()->avg('rating') ?? 0;
    }

    // Scope untuk alat yang tersedia
    public function scopeAvailable($query)
    {
        return $query->where('stock', '>', 0);
    }

    // Method kurangi stok
    public function decreaseStock($quantity = 1)
    {
        $this->stock -= $quantity;
        $this->save();
    }

    // Method tambah stok
    public function increaseStock($quantity = 1)
    {
        $this->stock += $quantity;
        $this->save();
    }
}
