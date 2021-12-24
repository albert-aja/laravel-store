<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $this->data['user'] = $this->user::count();
        $this->data['revenue'] = $this->transaction::where('transaction_status_id', 1)->sum('total_price');
        $this->data['transaction'] = $this->transaction::count();

        return view('pages.server.dashboard', $this->data);
    }
}
