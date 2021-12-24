<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('pages.client.dashboard.product.dashboard-products');
    }

    public function addProduct(){
        return view('pages.client.dashboard.product.add-product');
    }

    public function productDetail(){
        return view('pages.client.dashboard.product.products-detail');
    }
}
