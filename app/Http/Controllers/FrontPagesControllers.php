<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Discount;
use App\Models\HomePageSlider;
use App\Models\Category;


class FrontPagesControllers extends Controller
{
    public function getHomePage(){
        $frontPageName = 'home';
        $discount = Discount::all();
        $homePageSlider = HomePageSlider::all();
        $categories = Category::all();
        $arr = ['frontPageName'=>$frontPageName,
                'discount'=>$discount,
                'homePageSlider'=>$homePageSlider,
                'categories' => $categories
            ];
        return view('front.home',$arr);
    }
    public function getShopPage(){
        $frontPageName = 'shop';
        $arr = ['frontPageName'=>$frontPageName];
        return view('front.shop',$arr);
    }
    public function getAboutUsPage(){
        $frontPageName = 'about';
        $arr = ['frontPageName'=>$frontPageName];
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
