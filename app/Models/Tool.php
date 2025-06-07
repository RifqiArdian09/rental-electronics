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
}
