<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

//        $adminKey= Cookie::get('adminKey');
//        if ($adminKey == 'ak587238') {
//        } else {
//            return abort('404');
//        }

class ShopPageController extends Controller
{
    public function createProduct(Request $request)
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $title = $request->input('title');
            $price = $request->input('price');
            $category = $request->input('category');
            $text = $request->input('text');
            $file = $request->file('uploadImg');

            $validator = Validator::make($request->all(),
                ['title' => 'required|max:50',
                    'price' => 'required',
                    'text' => 'required|max:2000',
                    'uploadImg' => 'required'],
                [
                    'title.required' => 'поле должно быт заполненно',
                    'title.max' => 'поле должно быть не больше 50 синволов',
                    'price.required' => 'поле должно быт заполненно',
                    'text.required' => 'поле должно быт заполненно',
                    'text.max' => 'поле должно быть не больше 2000 синволов',
                    'uploadImg.required' => 'поле должно быт заполненно'
                ]
            );

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            Product::create(['title' => $title, 'price' => $price, 'category' => $category, 'text' => $text]);

            $maxId = Product::max('id');
            $file->move('images/productsImg', $maxId . ".jpg");
            $update = Product::find($maxId);
            $update->imgName = $maxId . ".jpg";
            $update->save();

            return back();
        } else {
            return abort('404');
        }

    }

    public function deleteOrEditProduct()
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {

        } else {
            return abort('404');
        }
    }
}
