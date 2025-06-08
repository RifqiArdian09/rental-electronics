<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = ['name', 'image', 'category_id', 'description','stock', 'price_per_day'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    // Method untuk mengurangi stok
    public function decreaseStock($quantity = 1)
    {
        $this->stock -= $quantity;
        $this->save();
    }

    // Method untuk menambah stok (jika diperlukan)
    public function increaseStock($quantity = 1)
    {
        $this->stock += $quantity;
        $this->save();
    }

    // Scope untuk alat yang tersedia
    public function scopeAvailable($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function testimonials()
    {
        return $this->hasManyThrough(
            Testimonial::class,
            Rental::class,
            'tool_id', // FK di rentals table
            'rental_id', // FK di testimonials table
            'id', // PK di tools table
            'id' // PK di rentals table
        );
    }

    // Accessor untuk rating rata-rata
    public function getAverageRatingAttribute()
    {
        return $this->testimonials()->avg('rating') ?? 0;
    }
}

