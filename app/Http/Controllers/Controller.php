<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TransactionStatus;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user              = User::class;
    protected $category          = Category::class;
    protected $product           = Product::class;
    protected $gallery           = ProductGallery::class;
    protected $transaction       = Transaction::class;
    protected $transactionDetail = TransactionDetail::class;
    protected $transactionStatus = TransactionStatus::class;
    protected $role              = Role::class;
    protected $cart              = Cart::class;
}
