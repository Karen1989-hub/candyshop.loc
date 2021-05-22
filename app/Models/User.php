<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Basket;


class User extends Model
{
    use HasFactory;
    protected $fillable = ['firstName','lastName','email','login','password','telephon'];

    public function getBasketProducts(){
        return $this->belongsToMany(Product::class,'baskets','userId','productId')->get();
    }

//    public function getBasketSinglProducts($id=11){
//        return $this->belongsToMany(Product::class,'baskets','userId','productId')->where('id',$id)->get();
//    }

    public function getBasketAllProductsPrice(){
        return $this->belongsToMany(Product::class,'baskets','userId','productId')->sum('price');
    }

    public function getBasketProductsCount(){
        return $this->hasMany(Basket::class,'userId')->get();
    }
}
