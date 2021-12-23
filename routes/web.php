<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/Category', [CategoryController::class, 'index'])->name('category');
Route::get('/Detail/{id}', [DetailController::class, 'index'])->name('detail');
Route::get('/Cart', [CartController::class, 'index'])->name('cart');
Route::get('/Success', [CartController::class, 'success'])->name('success');

Route::get('/Register/Success', [RegisterController::class, 'registerSuccess'])->name('register-success');

Auth::routes();