<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $slug){
        return view('pages.client.marketplace.detail',[
            'product' => $this->product::with(['galleries', 'user'])->where('slug', $request->slug)->firstOrFail(),
        ]);
    }

    public function add(Request $request, $id){
        $data = [
            'products_id' => $id,
            'users_id'    => Auth::user()->id
        ];

        $this->cart::create($data);

        return redirect()->route('cart');
    }
}
