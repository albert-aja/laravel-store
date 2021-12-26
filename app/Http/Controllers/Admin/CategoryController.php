<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->index_route = 'Category.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $query = $this->category::query();

            return Datatables::of($query)
                        ->addColumn('action', function($item){
                            return '
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle me-1 mb-1" type="button" data-bs-toggle="dropdown">Aksi</button>
                                        <div class="dropdown-menu">
                                            <a href="' .route('Category.edit', $item->id). '" class="dropdown-item">Edit</a>
                                            <form action="' .route('Category.destroy', $item->id). '" method="POST>
                                                ' .method_field('delete') . csrf_field(). '
                                                <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            ';
                        })
                        ->editColumn('photo', function($item){
                            return $item->photo ? '<img src="' .Storage::url($item->photo). '" style="max-height: 2.4em"/>' : '';
                        })
                        ->rawColumns(['action', 'photo'])
                        ->make();
        }

        return view('pages.server.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category'  => 'required|unique:categories,category',
            'photo'     => 'required|image|file|max:2048',
        ]);
        
        $data['slug'] = Str::slug($request->category);
        $data['photo'] = $request->file('photo')->store('category-images', 'public');

        $this->category::create($data);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->category::findOrFail($id);

        return view('pages.server.category.edit',[
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category'  => 'required|unique:categories,category,' .$id,
            'photo'     => 'image|file|max:2048',
        ]);
        
        $item = $this->category::findOrFail($id);

        
        if($request->photo){
            Storage::disk('public')->delete($item->photo);
            $data['photo'] = $request->file('photo')->store('category-images', 'public');
        }
        
        $data['slug'] = Str::slug($request->category);

        $item->update($data);

        return redirect()->route($this->index_route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->category::findOrFail($id)->delete();
        
        return redirect()->route($this->index_route);
    }
}