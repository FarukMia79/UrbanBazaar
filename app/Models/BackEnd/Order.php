<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    protected $fillable = ['user_id', 'name', 'phone', 'address', 'area', 'payment_method', 'shipping_cost', 'subtotal', 'total', 'status'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
