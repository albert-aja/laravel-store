<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('pages.client.marketplace.cart');
    }

    public function success(){
        return view('pages.client.marketplace.success');
    }
}
