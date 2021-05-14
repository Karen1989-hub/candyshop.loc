<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Discount;
use App\Models\HomePageSlider;
use App\Models\Category;
use App\Models\ContactData;
use App\Models\Employee;
use App\Models\Product;
use App\Models\News;
use App\Models\User;

class FrontPagesControllers extends Controller
{
    public function getInclud(){
        return [
            'awards'=>Award::all(),
            'categories'=>Category::all(),
            'discount'=>Discount::all(),
            'contactData'=>ContactData::where('id', 1)->get(),
            'autorizedUser'=>User::find(Cookie::get('userKey')),
            ];
}
    public function getHomePage()
    {
        $frontPageName = 'home';
        $discount = Discount::all();
        $homePageSlider = HomePageSlider::all();
        $contactData = ContactData::where('id', 1)->get();
        $row = $this->getInclud();
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $discount,
            'homePageSlider' => $homePageSlider,
            'categories' => $row['categories'],
            'awards' => $row['awards'],
            'contactData' => $contactData
        ];
        return view('front.home', $arr);
    }

    public function getShopPage($category = "all")
    {
        $frontPageName = 'shop';
        $discount = Discount::all();
        $contactData = ContactData::where('id', 1)->get();
        $categories = Category::all();
        $awards = Award::all();
        if ($category == "all") {
            $products = Product::all();
        } else {
            $products = Product::where('category', $category)->get();
        }
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $discount,
            'contactData' => $contactData,
            'products' => $products,
            'awards' => $awards,
            'categories' => $categories];
        return view('front.shop', $arr);
    }

    public function getDetailShopPage($id)
    {

        $frontPageName = 'shop';
        $discount = Discount::all();
        $contactData = ContactData::where('id', 1)->get();
        $singlProduct = Product::where('id', $id)->get();
        $awards = Award::all();

        $arr = ['frontPageName' => $frontPageName,
            'discount' => $discount,
            'contactData' => $contactData,
            'awards' => $awards,
            'singlProduct' => $singlProduct];
        return view('front.shopDetail', $arr);
    }

    public function getAboutUsPage()
    {
        $frontPageName = 'about';
        $discount = Discount::all();
        $contactData = ContactData::where('id', 1)->get();
        $aboutCompany = AboutCompany::first();
        $employees = Employee::all();
        $awards = Award::all();
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $discount,
            'contactData' => $contactData,
            'aboutCompany' => $aboutCompany,
            'employees' => $employees,
            'awards' => $awards
        ];
        return view('front.aboutUs', $arr);
    }

    public function getАwardsPage()
    {
        $frontPageName = 'about';
        $discount = Discount::all();
        $contactData = ContactData::where('id', 1)->get();
        $awards = Award::all();
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $discount,
            'contactData' => $contactData,
            'awards' => $awards
        ];
        return view('front.awards', $arr);
    }

    public function getNewsPage()
    {
        $frontPageName = 'about';
        $discount = Discount::all();
        $contactData = ContactData::where('id', 1)->get();
        $awards = Award::all();
        $news = News::all();
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $discount,
            'awards' => $awards,
            'contactData' => $contactData,
            'news' => $news
            ];
        return view('front.news', $arr);
    }

    public function getSinglNews(){
        $frontPageName = 'about';
        $discount = Discount::all();
        $contactData = ContactData::where('id', 1)->get();
        $awards = Award::all();
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $discount,
            'awards' => $awards,
            'contactData' => $contactData];
        return view('front.singlNews',$arr);
    }

    public function getContactUsPage()
    {
        $frontPageName = 'contactUs';
        $discount = Discount::all();
        $contactData = ContactData::where('id', 1)->get();
        $awards = Award::all();
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $discount,
            'awards' => $awards,
            'contactData' => $contactData];
        return view('front.contactUs', $arr);
    }

    public function userRegistrationPage(){
        $frontPageName = 'contactUs';
        $row = $this->getInclud();
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'awards' => $row['awards'],
            'contactData' => $row['contactData'],
            'autorizedUser' => $row['autorizedUser'],
        ];
        return view('front.userRegistration',$arr);
    }
}
