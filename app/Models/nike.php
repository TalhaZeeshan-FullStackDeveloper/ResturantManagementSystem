<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nike extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category',
        'image',
        // add other columns
    ];
}