<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'userOrderId',
        'productId',
        'productTitle',
        'productSinglPrice',
        'productAllPrice',
        'productCount'
    ];
}
