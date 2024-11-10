<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $primaryKey = 'pharmacy_id';

    protected $fillable = [
        'name', 'location', 'available_drugs', 'phone', 'email'
    ];

    public function inventory()
    {
        return $this->hasMany(Inventory::class, 'pharmacy_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'pharmacy_id');
    }
}
