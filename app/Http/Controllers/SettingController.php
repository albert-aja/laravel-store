<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function store(){
        return view('pages.client.dashboard.dashboard-setting', [
            'user' => Auth::user(),
            'categories' => $this->category::all(),
        ]);
    }
    
    public function account(){
        return view('pages.client.dashboard.dashboard-account', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request, $redirect){
        Auth::user()->update($request->all());

        return redirect()->route($redirect);
    }
}
