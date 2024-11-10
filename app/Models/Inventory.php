<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $primaryKey = 'inventory_id';

    protected $fillable = [
        'pharmacy_id', 'drug_id', 'quantity', 'last_update'
    ];

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class, 'pharmacy_id');
    }

    public function drug()
    {
        return $this->belongsTo(Drug::class, 'drug_id');
    }
}
