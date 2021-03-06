<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_name', 'slug', 'users_id',
        'categories_id', 'price', 'description'
    ];

    public function galleries(){
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
