<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $transactions = $this->transactionDetail::with(['transaction.user', 'product.galleries'])
                            ->whereHas('product', function($product){
                                $product->where('users_id', Auth::user()->id);
                            });

        return view('pages.client.dashboard.dashboard', [
            'transaction_count'  => $transactions->count(),
            'transactions'       => $transactions->get(),
            'revenue'            => $transactions->get()->reduce(function($carry, $item){
                                        return $carry + $item->price;
                                    }),
            'customer'           => $this->user::count(),
        ]);
    }
}
