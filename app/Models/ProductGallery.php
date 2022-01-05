<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $fillable = [
        'photo', 'products_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}
