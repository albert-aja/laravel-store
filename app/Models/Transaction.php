<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transaction_code', 'users_id', 'insurance_fee', 
        'shipping_fee', 'total_price'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
