<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('pages.server.product.dashboard-products');
    }

    public function addProduct(){
        return view('pages.server.product.add-product');
    }

    public function productDetail(){
        return view('pages.server.product.products-detail');
    }
}
