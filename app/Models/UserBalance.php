<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBalance extends Model
{
    use HasFactory;

    protected $table = 'user_balances';
    protected $fillable = [
        'amount',
        'user_id',
        'date'
    ];
}
