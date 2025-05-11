<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone',
        'address', 'payment_method', 'delivery_method',
        'total_price', 'payment_status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

