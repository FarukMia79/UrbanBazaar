<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'meta_title',
        'meta_description',
        'front_view',
        'status'
    ];
}
