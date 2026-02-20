<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;

class UserInteraction extends Model
{
    protected $fillable = ['user_id', 'product_id', 'interaction_type', 'weight'];
}
