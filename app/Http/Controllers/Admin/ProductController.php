<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->index_route = 'Product.index';
    }

    public function index()
    {
        if(request()->ajax()){
            $query = $this->product::with(['user', 'category']);
            
            return Datatables::of($query)
                        ->addColumn('action', function($item){
                            return '
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle me-1 mb-1" type="button" data-bs-toggle="dropdown">Aksi</button>
                                        <div class="dropdown-menu">
                                            <a href="' .route('Product.edit', $item->id). '" class="dropdown-item">Edit</a>
                                            <form action="' .route('Product.destroy', $item->id). '" method="POST">
                                                ' .method_field('delete') . csrf_field(). '
                                                <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            ';
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make();
        }

        return view('pages.server.product.index');
    }

    public function create()
    {
        return view('pages.server.product.create', [
            'users'      => $this->user::all(),
            'categories' => $this->category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name'  => 'required|string|max:255',
            'users_id'      => 'required|exists:users,id',
            'categories_id' => 'required|exists:categories,id',
            'price'         => 'required|integer',
            'description'   => 'required',
        ]);

        $data['slug'] = Str::slug($request->product_name);

        $this->product::create($data);

        return redirect()->route($this->index_route);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = $this->product::findOrFail($id);

        return view('pages.server.product.edit',[
            'item'       => $item,
            'users'      => $this->user::all(),
            'categories' => $this->category::all(),
        ]);
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

        $data['slug'] = Str::slug($request->product_name);
        
        $item = $this->product::findOrFail($id);
        
        $item->update($data);

        return redirect()->route($this->index_route);
    }

    public function destroy($id)
    {
        $this->product::findOrFail($id)->delete();
        
        return redirect()->route($this->index_route);
    }
}
