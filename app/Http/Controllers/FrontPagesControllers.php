<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use App\Models\Award;
use App\Models\Basket;
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
use App\Models\Galery;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;

class FrontPagesControllers extends Controller
{
    public function getInclud()
    {
        if (Cookie::get('userKey') != false) {
            $autorizedUser = User::find(Cookie::get('userKey'));
            //dd(User::find(Cookie::get('userKey'))->getBasketProducts());
            $basketProducts = User::find(Cookie::get('userKey'))->getBasketProducts();
            $basketAllProductsCount = User::find(Cookie::get('userKey'))->getBasketProducts()->count();
            $getBasketAllProductsPrice = User::find(Cookie::get('userKey'))->getBasketAllProductsPrice();
        } else {
            $autorizedUser = null;
            $basketProducts = null;
            $basketAllProductsCount = null;
            $getBasketAllProductsPrice = null;
        }

        return [
            'awards' => Award::all(),
            'discount' => Discount::all(),
            'contactData' => ContactData::where('id', 1)->get(),
            'autorizedUser' => $autorizedUser,
            'basketProducts' => $basketProducts,
            'basketAllProductsCount' => $basketAllProductsCount,
            'getBasketAllProductsPrice' => $getBasketAllProductsPrice,

        ];
    }



    public function getHomePage()
    {

        $frontPageName = 'home';
        $homePageSlider = HomePageSlider::all();
        $categories = Category::all();
        $news = News::all();
        $row = $this->getInclud();
        $product8 = Product::where('id','>',0)->limit(12)->get();
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'homePageSlider' => $homePageSlider,
            'categories' => $categories,
            'awards' => $row['awards'],
            'contactData' => $row['contactData'],
            'basketProducts' => $row['basketProducts'],
            'basketAllProductsCount' => $row['basketAllProductsCount'],
            'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
            'autorizedUser' => $row['autorizedUser'],
            'product8' => $product8,
            'news' => $news,
        ];
//         function getSiPr($id){
//            $n = Basket::where('userId',Cookie::get('userKey'))->where('productId',$id)->get();
//            return $n[0]->productCount;
//        };
//        dd(getSiPr(11));



        return view('front.home', $arr);
    }

    public function getShopPage(Request $request,$category = "all")
    {
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $row = $this->getInclud();
        $frontPageName = 'shop';
        $categories = Category::all();
        if ($category == "all" && $minPrice != "" && $maxPrice != "") {
            $products = Product::where('price','>',$minPrice)->where('price','<',$maxPrice)->paginate(30);
            $allProducts = Product::all();
            $filtr = true;
        } else if($category == "all" && $minPrice != ""){
            $products = Product::where('price','>',$minPrice)->paginate(30);
            $allProducts = Product::all();
            $filtr = true;
        } else if($category == "all" && $maxPrice != "") {
            $products = Product::where('price','<',$maxPrice)->paginate(30);
            $allProducts = Product::all();
            $filtr = true;
        } else if($category == "all"){
            $products = Product::paginate(30);
            $allProducts = Product::all();
            $filtr = false;
        } else {
            $products = Product::where('category', $category)->paginate(30);
            $allProducts = Product::where('category',$category)->get();
            $filtr = true;
        }

        $arr = ['frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'contactData' => $row['contactData'],
            'products' => $products,
            'awards' => $row['awards'],
            'basketProducts' => $row['basketProducts'],
            'basketAllProductsCount' => $row['basketAllProductsCount'],
            'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
            'autorizedUser' => $row['autorizedUser'],
            'searchError' => null,
            'pageCount' => ceil(count($allProducts)/30),
            'filtr' => $filtr,

            'categories' => $categories];



        return view('front.shop', $arr);
    }

    public function getDetailShopPage($id)
    {
        $row = $this->getInclud();
        $frontPageName = 'shop';
        $singlProduct = Product::where('id', $id)->get();
        if(Cookie::get('userKey') != null){
            $singlProductCount = Basket::where('userId',Cookie::get('userKey'))->where('productId',$id)->first();
        } else {
            $singlProductCount = null;
        }

        //dd($singlProductCount->productCount);

        $arr = ['frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'contactData' => $row['contactData'],
            'awards' => $row['awards'],
            'basketProducts' => $row['basketProducts'],
            'basketAllProductsCount' => $row['basketAllProductsCount'],
            'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
            'autorizedUser' => $row['autorizedUser'],
            'singlProductCount' => $singlProductCount,
            'searchError' => null,
            'singlProduct' => $singlProduct];
        return view('front.shopDetail', $arr);
    }
    public function getDetailShopPage2(Request $request){
        $title = $request->input('title');

        $singlProduct = Product::where('title',$title)->get();

        if(count($singlProduct)>0){
            $searchError = null;
            $id = $singlProduct[0]->id;

            $row = $this->getInclud();
            $frontPageName = 'shop';
            $singlProduct = Product::where('id', $id)->get();
            if (Cookie::get('userKey') != null) {
                $singlProductCount = Basket::where('userId', Cookie::get('userKey'))->where('productId', $id)->first();
            } else {
                $singlProductCount = null;
            }

            $arr = ['frontPageName' => $frontPageName,
                'discount' => $row['discount'],
                'contactData' => $row['contactData'],
                'awards' => $row['awards'],
                'basketProducts' => $row['basketProducts'],
                'basketAllProductsCount' => $row['basketAllProductsCount'],
                'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
                'autorizedUser' => $row['autorizedUser'],
                'singlProductCount' => $singlProductCount,
                'searchError' => $searchError,
                'singlProduct' => $singlProduct];
            return view('front.shopDetail', $arr);
        } else {
            $searchError = "нечего не найденно";
            $row = $this->getInclud();
            $frontPageName = 'shop';
            $arr = [
                'frontPageName' => $frontPageName,
                'discount' => $row['discount'],
                'contactData' => $row['contactData'],
                'awards' => $row['awards'],
                'basketProducts' => $row['basketProducts'],
                'basketAllProductsCount' => $row['basketAllProductsCount'],
                'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
                'autorizedUser' => $row['autorizedUser'],
//                'singlProductCount' => $singlProductCount,
                'searchError' => $searchError,
                'singlProduct' => $singlProduct];
            return view('front.shopDetail', $arr);
        }




    }

    public function getOrderPage(){
        $row = $this->getInclud();
        $frontPageName = 'shop';
        $arr = [
            'frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'awards' => $row['awards'],
            'contactData' => $row['contactData'],
            'basketProducts' => $row['basketProducts'],
            'basketAllProductsCount' => $row['basketAllProductsCount'],
            'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
            'autorizedUser' => $row['autorizedUser'],
        ];
        return view('front.toOrder',$arr);
    }

    public function getAboutUsPage()
    {
        $row = $this->getInclud();
        $frontPageName = 'about';
        $aboutCompany = AboutCompany::first();
        $employees = Employee::all();
        $galery = Galery::all();
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'contactData' => $row['contactData'],
            'aboutCompany' => $aboutCompany,
            'employees' => $employees,
            'basketProducts' => $row['basketProducts'],
            'basketAllProductsCount' => $row['basketAllProductsCount'],
            'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
            'autorizedUser' => $row['autorizedUser'],
            'awards' => $row['awards'],
            'galery' => $galery,
        ];
        return view('front.aboutUs', $arr);
    }

    public function getАwardsPage()
    {
        $row = $this->getInclud();
        $frontPageName = 'about';
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'contactData' => $row['contactData'],
            'basketProducts' => $row['basketProducts'],
            'basketAllProductsCount' => $row['basketAllProductsCount'],
            'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
            'autorizedUser' => $row['autorizedUser'],
            'awards' => $row['awards'],
        ];
        return view('front.awards', $arr);
    }

    public function getNewsPage()
    {
        $row = $this->getInclud();
        $frontPageName = 'about';
        $news = News::all();
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'awards' => $row['awards'],
            'basketProducts' => $row['basketProducts'],
            'basketAllProductsCount' => $row['basketAllProductsCount'],
            'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
            'contactData' => $row['contactData'],
            'autorizedUser' => $row['autorizedUser'],
            'news' => $news
        ];
        return view('front.news', $arr);
    }

    public function getSinglNews()
    {
        $row = $this->getInclud();
        $frontPageName = 'about';
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'awards' => $row['awards'],
            'basketProducts' => $row['basketProducts'],
            'basketAllProductsCount' => $row['basketAllProductsCount'],
            'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
            'autorizedUser' => $row['autorizedUser'],
            'contactData' => $row['contactData'],
        ];
        return view('front.singlNews', $arr);
    }

    public function getContactUsPage()
    {
        $row = $this->getInclud();
        $frontPageName = 'contactUs';
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'awards' => $row['awards'],
            'basketProducts' => $row['basketProducts'],
            'basketAllProductsCount' => $row['basketAllProductsCount'],
            'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
            'autorizedUser' => $row['autorizedUser'],
            'contactData' => $row['contactData'],
        ];
        return view('front.contactUs', $arr);
    }

    public function userRegistrationPage()
    {
        $frontPageName = 'contactUs';
        $row = $this->getInclud();
        if (Cookie::get('userRegistrationError') != false) {
            $userRegistrationError = Cookie::get('userRegistrationError');
        } else {
            $userRegistrationError = null;
        }
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'awards' => $row['awards'],
            'contactData' => $row['contactData'],
            'basketProducts' => $row['basketProducts'],
            'basketAllProductsCount' => $row['basketAllProductsCount'],
            'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
            'autorizedUser' => $row['autorizedUser'],
            'userRegistrationError' => $userRegistrationError,
        ];
        return view('front.userRegistration', $arr);
    }

    public function wholesalerRegistration(){
        $frontPageName = 'contactUs';
        $row = $this->getInclud();
        if (Cookie::get('userRegistrationError') != false) {
            $userRegistrationError = Cookie::get('userRegistrationError');
        } else {
            $userRegistrationError = null;
        }
        $arr = ['frontPageName' => $frontPageName,
            'discount' => $row['discount'],
            'awards' => $row['awards'],
            'contactData' => $row['contactData'],
            'basketProducts' => $row['basketProducts'],
            'basketAllProductsCount' => $row['basketAllProductsCount'],
            'getBasketAllProductsPrice' => $row['getBasketAllProductsPrice'],
            'autorizedUser' => $row['autorizedUser'],
            'userRegistrationError' => $userRegistrationError,
        ];
        return view('front.wholesalerRegistration', $arr);
    }
}
