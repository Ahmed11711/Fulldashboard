<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

}