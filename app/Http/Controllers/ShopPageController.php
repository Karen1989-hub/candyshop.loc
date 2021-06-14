<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\ContactData;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use App\Models\Restrictions;

//        $adminKey= Cookie::get('adminKey');
//        if ($adminKey == 'ak587238') {
//        } else {
//            return abort('404');
//        }

class ShopPageController extends Controller
{
    public function createProduct(Request $request)
    {
        $title = $request->input('title');
        $price = $request->input('price');
        $calculateType = $request->input('calculateType');
        $countInStock = $request->input('countInStock');
        $category = $request->input('category');
        $text = $request->input('description');
        $file = $request->file('uploadImg');

        $validator = Validator::make($request->all(),
            ['title' => 'required|max:50',
                'price' => 'required',
                'description' => 'required|max:2000',
                'uploadImg' => 'required'],
            [
                'title.required' => 'поле должно быт заполненно',
                'title.max' => 'поле должно быть не больше 50 синволов',
                'price.required' => 'поле должно быт заполненно',
                'description.required' => 'поле должно быт заполненно',
                'description.max' => 'поле должно быть не больше 2000 синволов',
                'uploadImg.required' => 'поле должно быт заполненно'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Product::create(['title' => $title, 'price' => $price, 'calculateType' => $calculateType,'countInStock' => $countInStock, 'category' => $category, 'description' => $text]);

        $maxId = Product::max('id');
        $file->move('images/productsImg', $maxId . ".jpg");
        $update = Product::find($maxId);
        $update->imgName = $maxId . ".jpg";
        $update->save();

        return back();

    }

    public function deleteProduct($id)
    {
        $deletedProduct = Product::where('id',$id)->get();
        $imgName = $deletedProduct[0]->imgName;
        unlink('images/productsImg/'.$imgName);
        Product::destroy($id);

        return back();
    }

    public function editProductPrice(Request $request)
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $productId = $request->input('productId');
            $price = $request->input('price');
            $countInStock = $request->input('countInStock');
            $update = Product::find($productId);
            $update->price = $price;
            $update->countInStock = $countInStock;
            $update->save();
            return back();
        } else {
            return abort('404');
        }
    }

    public function getErrorAboutCountInStockPage(){
        $autorizedUser = User::find(Cookie::get('userKey'));
        $arr = [
            'autorizedUser' => $autorizedUser,
            'discount' => Discount::all(),
            'frontPageName' => 'shop',
            'basketAllProductsCount' => User::find(Cookie::get('userKey'))->getBasketProducts()->count(),
            'basketProducts' => User::find(Cookie::get('userKey'))->getBasketProducts(),
            'awards' => Award::all(),
            'contactData' => ContactData::where('id', 1)->get(),
        ];
        return view('front.errorAboutCountInStock',$arr);
    }

    public function errorAboutMinSalerCount(){
        $autorizedUser = User::find(Cookie::get('userKey'));
        $arr = [
            'autorizedUser' => $autorizedUser,
            'discount' => Discount::all(),
            'frontPageName' => 'shop',
            'basketAllProductsCount' => User::find(Cookie::get('userKey'))->getBasketProducts()->count(),
            'basketProducts' => User::find(Cookie::get('userKey'))->getBasketProducts(),
            'awards' => Award::all(),
            'contactData' => ContactData::where('id', 1)->get(),
            'minSaleCountForWholesaler' => Restrictions::find(1)->minSaleCountForWholesaler,
        ];
        return view('front.errorAboutMinSalerCount',$arr);
    }
}
