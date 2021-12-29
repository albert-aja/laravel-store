<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->index_route = 'User.index';
    }

    public function index()
    {
        if(request()->ajax()){
            $query = $this->user::query();

            return Datatables::of($query)
                        ->addColumn('action', function($item){
                            return '
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle me-1 mb-1" type="button" data-bs-toggle="dropdown">Aksi</button>
                                        <div class="dropdown-menu">
                                            <a href="' .route('User.edit', $item->id). '" class="dropdown-item">Edit</a>
                                            <form action="' .route('User.destroy', $item->id). '" method="POST>
                                                ' .method_field('delete') . csrf_field(). '
                                                <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            ';
                        })
                        ->addColumn('role', function($item){
                            return $this->role::find($item->id)->role;
                        })
                        ->rawColumns(['action', 'role'])
                        ->addIndexColumn()
                        ->make();
        }

        return view('pages.server.user.index');
    }

    public function create()
    {
        return view('pages.server.user.create', [
            'roles' => $this->role::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => 'required|string',
            'email'     => 'required|unique:users,email|email',
            'password'  => 'required',
            'role_id'   => 'required',
        ]);

        $data['password'] = bcrypt($request->password);

        $this->user::create($data);

        return redirect()->route($this->index_route);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user::findOrFail($id);

        return view('pages.server.user.edit',[
            'user' => $user,
            'roles' => $this->role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama'      => 'required|string',
            'email'     => 'required|email|unique:users,email,' .$id,
            'role_id'   => 'required',
        ]);
        
        $item = $this->user::findOrFail($id);
        
        $item->update($data);

        return redirect()->route($this->index_route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {dd($id);
        $this->user::findOrFail($id)->delete();
        
        return redirect()->route($this->index_route);
    }
}
