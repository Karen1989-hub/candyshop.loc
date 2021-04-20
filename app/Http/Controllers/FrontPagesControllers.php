<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Discount;
use App\Models\HomePageSlider;
use App\Models\Category;
use App\Models\ContactData;
use App\Models\Employee;
use App\Models\Product;


class FrontPagesControllers extends Controller
{
    public function getHomePage(){
        $frontPageName = 'home';
        $discount = Discount::all();
        $homePageSlider = HomePageSlider::all();
        $categories = Category::all();
        $contactData = ContactData::where('id',1)->get();
        $arr = ['frontPageName'=>$frontPageName,
                'discount'=>$discount,
                'homePageSlider'=>$homePageSlider,
                'categories' => $categories,
                'contactData' => $contactData
            ];
        return view('front.home',$arr);
    }
    public function getShopPage($category = "all"){

//        $row = Category::all();
//        foreach ($row as $val){
//            dump($val->title);
//            dump($val->getProductCount());
//        }

        $frontPageName = 'shop';
        $discount = Discount::all();
        $contactData = ContactData::where('id',1)->get();
        $categories = Category::all();
        if($category == "all"){
            $products = Product::all();
        } else {
            $products = Product::where('category',$category)->get();
        }
        $arr = ['frontPageName'=>$frontPageName,
                'discount'=>$discount,
                'contactData' => $contactData,
                'products'=>$products,
                'categories'=>$categories];
        return view('front.shop',$arr);
    }

    public function getDetailShopPage($id){

        $frontPageName = 'shop';
        $discount = Discount::all();
        $contactData = ContactData::where('id',1)->get();
        $singlProduct = Product::where('id',$id)->get();

        $arr = ['frontPageName'=>$frontPageName,
            'discount'=>$discount,
            'contactData' => $contactData,
            'singlProduct'=>$singlProduct];
        return view('front.shopDetail',$arr);
    }

    public function getAboutUsPage(){
        $frontPageName = 'about';
        $discount = Discount::all();
        $contactData = ContactData::where('id',1)->get();
        $aboutCompany = AboutCompany::first();
        $employees = Employee::all();
        $arr = ['frontPageName'=>$frontPageName,
                'discount'=>$discount,
                'contactData'=>$contactData,
                'aboutCompany'=>$aboutCompany,
                'employees'=>$employees
            ];
        return view('front.aboutUs',$arr);
    }
    public function getАwardsPage(){
        $frontPageName = 'about';
        $discount = Discount::all();
        $contactData = ContactData::where('id',1)->get();
        $arr = ['frontPageName'=>$frontPageName,
                'discount'=>$discount,
                'contactData'=>$contactData];
        return view('front.awards',$arr);
    }
    public function getNewsPage(){
        $frontPageName = 'about';
        $arr = ['frontPageName'=>$frontPageName];
        return view('front.news',$arr);
    }
    public function getContactUsPage(){
        $frontPageName = 'contactUs';
        $arr = ['frontPageName'=>$frontPageName];
        return view('front.contactUs',$arr);
    }
}
