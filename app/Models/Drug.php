<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $primaryKey = 'drug_id';

    protected $fillable = [
        'name', 'company', 'information', 'expiry_date', 'prescription_required'
    ];

    public function inventory()
    {
        return $this->hasMany(Inventory::class, 'drug_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'drug_id');
    }
}
