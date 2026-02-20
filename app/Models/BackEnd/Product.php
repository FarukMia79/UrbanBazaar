<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\BackEnd\Category;
use App\Models\BackEnd\SubCategory;
use App\Models\BackEnd\Brand;
use App\Models\BackEnd\ProductImage;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'name',
        'slug',
        'product_code',
        'unit',
        'video_url',
        'price',
        'discount_price',
        'stock_quantity',
        'image',
        'description',
        'color_ids',
        'size_ids',
        'tags',
        'status',
        'hot_deals'
    ];


    protected function casts(): array
    {
        return [
            'color_ids' => 'array',
            'size_ids'  => 'array',
            'tags'      => 'array',
            'status'    => 'boolean',
            'hot_deals' => 'boolean',
            'price'     => 'decimal:2',
            'discount_price' => 'decimal:2',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }


    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }



    public function multi_images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
