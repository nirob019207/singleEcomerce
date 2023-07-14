<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_long_des',
        'product_short_des',
        'price',
        'product_subcategory_name',
        'product_category_name',
        'product_category_id',
        'product_subcategory_id',
        
        'product_img',
        'slug',

    ];
}