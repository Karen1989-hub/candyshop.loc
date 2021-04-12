<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Discount;
use App\Models\HomePageSlider;
use App\Models\Category;
use App\Models\ContactData;


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
    public function getShopPage(){
        $frontPageName = 'shop';
        $discount = Discount::all();
        $arr = ['frontPageName'=>$frontPageName,
                'discount'=>$discount];
        return view('front.shop',$arr);
    }
    public function getAboutUsPage(){
        $frontPageName = 'about';
        $discount = Discount::all();
        $contactData = ContactData::where('id',1)->get();
        $aboutCompany = AboutCompany::first();
        $arr = ['frontPageName'=>$frontPageName,
                'discount'=>$discount,
                'contactData'=>$contactData,
                'aboutCompany'=>$aboutCompany
            ];
        return view('front.aboutUs',$arr);
    }
    public function getАwardsPage(){
        $frontPageName = 'about';
        $arr = ['frontPageName'=>$frontPageName];
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
