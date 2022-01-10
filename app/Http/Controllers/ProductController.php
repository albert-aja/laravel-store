<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        return view('pages.client.dashboard.product.dashboard-products', [
            'products' => $this->product::with(['galleries', 'category'])
                                ->where('users_id', Auth::user()->id)
                                ->get(),
        ]);
    }

    public function details($id){
        return view('pages.client.dashboard.product.products-detail',[
            'product'    => $this->product::with(['galleries', 'user', 'category'])->findOrFail($id),
            'categories' => $this->category::all(),
        ]);
    }

    public function uploadImage(Request $request){
        $data = $request->validate([
            'products_id'   => 'required|exists:products,id',
            'photo'         => 'required|image|file|max:2048',
        ]);
        
        $data['photo'] = $request->file('photo')->store('product-images', 'public');

        $this->gallery::create($data);

        return redirect()->route('productDetail', $request->id);
    }

    public function deleteImage($id){
        Storage::disk('public')->delete($this->gallery::find($id)->photo);
        $this->gallery::findOrFail($id)->delete();
        
        return redirect()->route('productDetail', $id);
    }

    public function create(){
        return view('pages.client.dashboard.product.add-product',[
            'categories' => $this->category::all()
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'product_name'  => 'required|string|max:255',
            'users_id'      => 'required|exists:users,id',
            'categories_id' => 'required|exists:categories,id',
            'price'         => 'required|integer',
            'description'   => 'required',
        ]);

        $request->validate([
            'photo'   => 'required',
            'photo.*' => 'image|file|max:2048',
        ]);

        $data['slug'] = Str::slug($request->product_name);

        $product = $this->product::create($data);
        
        foreach($request->file('photo') as $file){
            $photo = [
                'products_id'   => $product->id,
                'photo'         => $file->store('product-images', 'public'),
            ];

            $this->gallery::create($photo);
        }

        return redirect()->route('product');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'product_name'  => 'required|string|max:255',
            'users_id'      => 'required|exists:users,id',
            'categories_id' => 'required|exists:categories,id',
            'price'         => 'required|integer',
            'description'   => 'required',
        ]);

        $request->validate([
            'photo'   => 'required',
            'photo.*' => 'image|file|max:2048',
        ]);

        $data['slug'] = Str::slug($request->product_name);
        
        $item = $this->product::findOrFail($id);
        
        $item->update($data);

        return redirect()->route('product');
    }
}
