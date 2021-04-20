<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title','price','calculateType','category','description','imgName'];

    public function category(){
        return $this->belongsTo('App\Models\Product');
    }
}
