<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name', 'color_code', 'status'];
}
