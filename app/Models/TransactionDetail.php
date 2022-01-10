<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transactions_id', 'code', 'resi',
        'products_id', 'price', 'transaction_status_id'
    ];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
    
    public function transaction(){
        return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }

    public function transactionStatus(){
        return $this->hasOne(TransactionStatus::class, 'id', 'transaction_status_id');
    }
}
