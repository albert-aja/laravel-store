<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Exception;

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class CheckoutController extends Controller
{
    public function __construct(){        
        //CONFIG MIDTRANS
        Config::$serverKey      = config('services.midtrans.serverKey');
        Config::$isProduction   = config('services.midtrans.isProduction');
        Config::$isSanitized    = config('services.midtrans.isSanitized');
        Config::$is3ds          = config('services.midtrans.is3ds');
    }

    public function process(Request $request){
        //DATA 2 DB
        $user = Auth::user();

        $user->update($request->except('total_price'));
        
        $transaction_code = 'STORE-' .mt_rand(000000,999999);
        $carts = $this->cart::with(['product', 'user'])
                    ->where('users_id', $user->id)
                    ->get();

        $transaction = $this->transaction::create([
            'transaction_code'      => $transaction_code,
            'users_id'              => $user->id,
            'insurance_fee'         => 0,
            'shipping_fee'          => 0,
            'total_price'           => $request->total_price,
            'transaction_status_id' => 1,
        ]);

        foreach($carts as $cart){
            $this->transactionDetail::create([
                'transactions_id'    => $transaction->id,
                'code'               => 'TRX-' .mt_rand(000000,999999),
                'resi'               => '',
                'products_id'        => $cart->product->id,
                'price'              => $cart->product->price,
                'shipping_status'    => 'PENDING',
            ]);
        }

        $this->cart::where('users_id', Auth::user()->id)->delete();
        
        //DATA 2 MIDTRANS
        $midtrans = [
            'transaction_details' => [
                'order_id'      => $transaction_code,
                'gross_amount'  => (int) $request->total_price
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email'      => $user->email,
            ],
            'enabled_payments' => [
                'gopay', 'bank_transfer'
            ],
            'vtweb' => []
        ];

        try {
            return redirect(Snap::createTransaction($midtrans)->redirect_url);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request){
        $notification = new Notification();

        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        $transaction = $this->transaction::findOrFail($order_id);

        //handle notification status
        if($status == 'capture'){
            if($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->status = 'PENDING';
                } else {
                    $transaction->status = 'SUCCESS';
                }
            }
        } else if($status == 'settlement'){
            $transaction->status = 'SUCCESS';
        } else if($status == 'pending'){
            $transaction->status = 'PENDING';
        } else if($status == 'deny'){
            $transaction->status = 'CANCELLED';
        } else if($status == 'expired'){
            $transaction->status = 'CANCELLED';
        } else if($status == 'cancel'){
            $transaction->status = 'CANCELLED';
        }

        $transaction->save();
    }
}
