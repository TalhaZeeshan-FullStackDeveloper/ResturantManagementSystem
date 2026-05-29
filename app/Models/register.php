<?php

namespace App\Models;

// 1. Add this import at the top
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// 2. Change 'extends Model' to 'extends Authenticatable'
class Register extends Authenticatable 
{
    use HasFactory, Notifiable;

    protected $table = 'registers'; // Ensure this matches your table name

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', // Make sure this is here if you added the column
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}