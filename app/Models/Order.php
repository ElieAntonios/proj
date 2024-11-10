<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id', 'pharmacy_id', 'drug_id', 'quantity', 'total_price', 'order_status', 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class, 'pharmacy_id');
    }

    public function drug()
    {
        return $this->belongsTo(Drug::class, 'drug_id');
    }
}
