<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    // Set the primary key
    protected $primaryKey = 'user_id';

    // Specify fillable fields
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'role_type', // e.g., 'customer' or 'admin'
    ];

    // Define hidden attributes (e.g., password and remember token)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Define casting for data types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship with orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}

