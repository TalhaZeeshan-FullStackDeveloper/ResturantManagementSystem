<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RykCart extends Model
{
    protected $fillable = [
        'product_id', 'product_name', 'category', 'image', 'price', 'quantity'
    ];
}