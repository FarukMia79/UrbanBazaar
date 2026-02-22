<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'product_id', 'color', 'size', 'qty', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
