<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    public function __construct()
    {
        $this->index_route = 'Gallery.index';
    }

    public function index()
    {
        if(request()->ajax()){
            $query = $this->gallery::with(['product']);

            return Datatables::of($query)
                        ->addColumn('action', function($item){
                            return '
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle me-1 mb-1" type="button" data-bs-toggle="dropdown">Aksi</button>
                                        <div class="dropdown-menu">
                                            <form action="' .route('Gallery.destroy', $item->id). '" method="POST">
                                                ' .method_field('delete') . csrf_field(). '
                                                <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            ';
                        })
                        ->editColumn('photo', function($item){
                            return $item->photo ? '<img src="' .Storage::url($item->photo). '" style="max-height: 5em"/>' : '';
                        })
                        ->rawColumns(['action', 'photo'])
                        ->addIndexColumn()
                        ->make();
        }

        return view('pages.server.product_gallery.index');
    }

    public function create()
    {
        return view('pages.server.product_gallery.create', [
            'products' =>$this->product::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'products_id'   => 'required|exists:products,id',
            'photo'         => 'required|image|file|max:2048',
        ]);
        
        $data['photo'] = $request->file('photo')->store('product-images', 'public');

        $this->gallery::create($data);

        return redirect()->route($this->index_route);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $this->gallery::findOrFail($id)->delete();
        
        return redirect()->route($this->index_route);
    }
}