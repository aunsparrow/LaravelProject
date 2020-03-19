<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productName',
        'price',
        'quantity',
        'color',
        'type',
        'image',
        'createdBy',
        'productDetail'
    ];
}
