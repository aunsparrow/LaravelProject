<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'color',
        'type',
        'image',
        'created_by'
    ];
}
