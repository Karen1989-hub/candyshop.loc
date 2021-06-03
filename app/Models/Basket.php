<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Basket extends Model
{
    use HasFactory;
    protected $fillable = ['userId','productId','productCount'];

    public function getSinglProduct(){
        return $this->hasMany(Product::class,'id','productId')->first();
    }

}
