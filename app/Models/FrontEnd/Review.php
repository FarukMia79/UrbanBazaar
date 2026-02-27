<?php

namespace App\Models\FrontEnd;

use Illuminate\Database\Eloquent\Model;
use App\Models\BackEnd\Product;
use App\Models\User;

class Review extends Model
{
    protected $fillable = [
        'name',
        'email',
        'ratting',
        'review',
        'product_id',
        'customer_id',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
