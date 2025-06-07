<?php
// app/Models/Customer.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'photo_url', 'profession'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
