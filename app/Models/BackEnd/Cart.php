<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'qty', 'color', 'size', 'price'];

    public function product(): BelongsTo
    {
        // নিশ্চিত করুন আপনার প্রোডাক্ট মডেলের পাথ ঠিক আছে
        return $this->belongsTo(Product::class, 'product_id');
    }
}
