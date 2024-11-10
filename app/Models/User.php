<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'address', 'role_type'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
