<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'customerName', 'customerEmail', 'productId', 'rating', 
        'comment_en', 'comment_ar', 'reply', 'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
