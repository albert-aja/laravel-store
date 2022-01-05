<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Category;
use App\Models\Transaction;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user         = User::class;
    protected $category     = Category::class;
    protected $product      = Product::class;
    protected $gallery      = ProductGallery::class;
    protected $transaction  = Transaction::class;
    protected $role         = Role::class;
}
