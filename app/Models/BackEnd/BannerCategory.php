<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;

class BannerCategory extends Model
{
    protected $fillable = ['category_id', 'image', 'link', 'status'];

    public function category()
    {
        return $this->belongsTo(BannerCategory::class, 'category_id');
    }
}
