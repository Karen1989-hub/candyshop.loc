<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title','price','calculateType','category','description','imgName','countInStock'];

    public function category(){
        return $this->belongsTo('App\Models\Product');
    }
    public function getBasketUser(){
        return $this->belongsToMany(User::class,'baskets','productId','userId');
    }

    public function getProductInBasketCount(){
        return $this->hasMany(Basket::class,'productId')->where('userId',Cookie::get('userKey'))->first();
    }


}
