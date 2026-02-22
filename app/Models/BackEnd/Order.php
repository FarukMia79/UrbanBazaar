<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'name', 'phone', 'address', 'area', 'payment_method', 'shipping_cost', 'subtotal', 'total', 'status'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
