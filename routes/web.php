<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController as userCategory;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController as userDashboard;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\Admin\DashboardController as adminDashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//user
//home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/Category', [userCategory::class, 'index'])->name('categories');
Route::get('/Category/{slug}', [userCategory::class, 'detail'])->name('category-detail');
Route::get('/Detail/{slug}', [DetailController::class, 'index'])->name('detail');
Route::post('/Detail/{id}', [DetailController::class, 'add'])->name('detail-add');

Route::post('/Checkout/Callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');
Route::get('/Success', [CartController::class, 'success'])->name('success');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/Cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/Cart/{id}', [CartController::class, 'delete'])->name('cart-delete');
    Route::post('/Checkout', [CheckoutController::class, 'process'])->name('checkout');

    //dashboard
    Route::get('/Dashboard', [userDashboard::class, 'index'])->name('dashboard');

    Route::get('/Dashboard/Product', [ProductController::class, 'index'])->name('product');
    Route::get('/Dashboard/Product/Add', [ProductController::class, 'create'])->name('addProduct');
    Route::post('/Dashboard/Product', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('/Dashboard/ProductDetail/{id}', [ProductController::class, 'details'])->name('productDetail');
    Route::post('/Dashboard/Product/Edit/{id}', [ProductController::class, 'update'])->name('productUpdate');

    Route::post('/Dashboard/Product/Gallery/Upload', [ProductController::class, 'uploadImage'])
            ->name('upload-product-image');
    Route::get('/Dashboard/Product/Gallery/Delete/{id}', [ProductController::class, 'deleteImage'])
            ->name('delete-product-image');

    Route::get('/Dashboard/Transactions', [TransactionController::class, 'index'])->name('transactions');
    Route::get('/Dashboard/TransactionDetail/{id}', [TransactionController::class, 'transactionDetail'])
                ->name('transactionDetail');

    Route::get('/Dashboard/Setting', [SettingController::class, 'index'])->name('setting');
    Route::get('/Dashboard/Account', [AccountController::class, 'index'])->name('account');
});

//admin dashboard
Route::prefix('Admin')->namespace('Admin')->middleware(['auth','admin'])->group(function(){
    Route::get('/', [adminDashboard::class, 'index'])->name('admin-dashboard');
    Route::resource('Category', '\App\Http\Controllers\Admin\CategoryController');
    Route::resource('User', '\App\Http\Controllers\Admin\UserController');
    Route::resource('Product', '\App\Http\Controllers\Admin\ProductController');
    Route::resource('Gallery', '\App\Http\Controllers\Admin\ProductGalleryController');
});

//auth
Route::get('/Register/Success', [RegisterController::class, 'registerSuccess'])->name('register-success');

Auth::routes();

