<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BackEnd\Product;

class UserInteraction extends Model
{
    protected $fillable = ['user_id', 'product_id', 'interaction_type', 'weight'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
