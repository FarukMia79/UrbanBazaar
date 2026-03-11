<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = ['site_name', 'white_logo', 'dark_logo', 'favicon', 'status'];
}
