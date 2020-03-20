<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $fillable = [
    'orderId',
    'productId',
    'quantity',
    'totalPrice',
    'updateBy'
    ];
}
