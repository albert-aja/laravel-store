<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transactions_id', 'code', 'resi',
        'products_id', 'price', 'shipping_status'
    ];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
    
    public function transaction(){
        return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }
}
