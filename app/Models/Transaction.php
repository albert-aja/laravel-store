<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transaction_code', 'resi', 'user_id',
        'insurance_fee', 'shipping_fee', 'product_id',
        'total_price', 'transaction_status_id'
    ];
}
