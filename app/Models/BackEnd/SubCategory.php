<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'image', 'meta_title', 'meta_description', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
