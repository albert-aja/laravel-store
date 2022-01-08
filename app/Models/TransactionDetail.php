<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transactions_id', 'code', 'resi',
        'products_id', 'price', 'shipping_status'
    ];
}
