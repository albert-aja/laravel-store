<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct(){
        $this->transactionRel = $this->transactionDetail::with(['transaction.user', 'product.galleries', 'transactionStatus']);
    }

    public function index(){
        return view('pages.client.dashboard.transactions.dashboard-transaction',[
            'sellTransaction' => $this->transactionRel->whereHas('product', function($product){
                                    $product->where('users_id', Auth::user()->id);
                                })->get(),
            'buyTransaction' => $this->transactionRel->whereHas('transaction', function($transaction){
                                    $transaction->where('users_id', Auth::user()->id);
                                })->get(),
        ]);
    }

    public function details($id){
        return view('pages.client.dashboard.transactions.transaction-detail',[
            'transaction_details' => $this->transactionRel->findOrFail($id),
        ]);
    }

    public function update(Request $request, $id){
        $this->transactionDetail::findOrFail($id)->update($request->all());

        return redirect()->route('transactionDetail', $id);
    }
}
