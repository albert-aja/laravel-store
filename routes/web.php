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
Route::get('/Category', [userCategory::class, 'index'])->name('category');
Route::get('/Detail/{id}', [DetailController::class, 'index'])->name('detail');
Route::get('/Cart', [CartController::class, 'index'])->name('cart');
Route::get('/Success', [CartController::class, 'success'])->name('success');

//dashboard
Route::get('/Dashboard', [userDashboard::class, 'index'])->name('dashboard');
Route::get('/Product', [ProductController::class, 'index'])->name('product');
Route::get('/AddProduct', [ProductController::class, 'addProduct'])->name('addProduct');
Route::get('/ProductDetail/{id}', [ProductController::class, 'productDetail'])->name('productDetail');
Route::get('/Transactions', [TransactionController::class, 'index'])->name('transactions');
Route::get('/TransactionDetail/{id}', [TransactionController::class, 'transactionDetail'])
            ->name('transactionDetail');
Route::get('/Setting', [SettingController::class, 'index'])->name('setting');
Route::get('/Account', [AccountController::class, 'index'])->name('account');

//admin dashboard
Route::prefix('Admin')->namespace('Admin')->group(function(){
    Route::get('/', [adminDashboard::class, 'index'])->name('admin-dashboard');
    Route::resource('Category', '\App\Http\Controllers\Admin\CategoryController');
    Route::resource('User', '\App\Http\Controllers\Admin\UserController');
    Route::resource('Product', '\App\Http\Controllers\Admin\ProductController');
    Route::resource('Gallery', '\App\Http\Controllers\Admin\ProductGalleryController');
});

// ->middleware(['auth','admin'])
//auth
Route::get('/Register/Success', [RegisterController::class, 'registerSuccess'])->name('register-success');

Auth::routes();

