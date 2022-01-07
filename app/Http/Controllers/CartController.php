<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        return view('pages.client.marketplace.cart', [
            'carts' => $this->cart::with(['product.galleries', 'user'])
                            ->where('users_id', Auth::user()->id)
                            ->get(),
        ]);
    }

    public function delete($id){
        $this->cart::findOrFail($id)->delete();
         
        return redirect()->to('Cart');
    }

    public function success(){
        return view('pages.client.marketplace.success');
    }
}
