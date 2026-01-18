<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en', 'name_ar', 'description_en', 'description_ar', 
        'price', 'mainImage', 'additionalImages', 'videoUrl', 
        'categoryId', 'stock', 'sku'
    ];

    protected $casts = [
        'additionalImages' => 'array',
        'price' => 'float',
        'stock' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
