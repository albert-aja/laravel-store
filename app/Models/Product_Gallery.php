<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Gallery extends Model
{
    protected $fillable = [
        'photo', 'product_id'
    ];
}
