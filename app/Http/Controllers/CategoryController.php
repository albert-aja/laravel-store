<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('pages.client.marketplace.category',[
            'categories' => $this->category::all(),
            'products'   => $this->product::with(['galleries'])->paginate(16),
        ]);
    }

    public function detail(Request $request, $slug){
        $category = $this->category::where('slug', $slug)->firstOrFail();

        return view('pages.client.marketplace.category',[
            'categories' => $this->category::all(),
            'products'   => $this->product::with(['galleries'])->where('categories_id', $category->id)->paginate(16),
        ]);
    }
}
