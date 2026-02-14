<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'meta_title', 'meta_description', 'status'];
}
