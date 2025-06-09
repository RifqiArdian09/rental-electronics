<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Relasi ke Tool
    public function tools()
    {
        return $this->hasMany(Tool::class);
    }
}
