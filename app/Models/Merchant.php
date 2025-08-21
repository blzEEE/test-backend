<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = [
        'id',
        'merchant_id',
        'payment_id',
        'status',
        'amount',
        'amount_paid',
        'sign'
    ];
}
