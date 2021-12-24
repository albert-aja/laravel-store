<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        return view('pages.client.dashboard.transactions.dashboard-transaction');
    }

    public function transactionDetail(){
        return view('pages.client.dashboard.transactions.transaction-detail');
    }
}
