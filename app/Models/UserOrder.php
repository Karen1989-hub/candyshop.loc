<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserOrder extends Model
{
    use HasFactory;
    protected $fillable = ['userId','payment','status'];

    public function getOrdersUser(){
        return $this->hasMany(User::class,'id','userId')->first();
    }

    public function getUserOrderProduct(){
        return $this->hasMany(UserOrderProduct::class,'userOrderId');
    }
}
















