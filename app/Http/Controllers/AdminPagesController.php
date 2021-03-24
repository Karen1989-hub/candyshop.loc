<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Discount;
use App\Models\HomePageSlider;
use App\Models\Category;

class AdminPagesController extends Controller
{


    public function getDiscountsPage()
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $pageCategory = "a";
            $pageNumber = "a1";
            $discounts = Discount::all();
            $arr = ['pageNumber' => $pageNumber, 'pageCategory' => $pageCategory ,'discounts'=>$discounts];
            return view('admin.home', $arr);
        } else {
            return abort('404');
        }
    }

    public function getEditSliderPage()
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $pageCategory = "b";
            $pageNumber = "b1";
            $homePageSlider = HomePageSlider::all();
            $arr = ['pageNumber' => $pageNumber,
                    'pageCategory' => $pageCategory,
                    'homePageSlider' => $homePageSlider];
            return view('admin.еditSlider', $arr);
        } else {
            return abort('404');
        }
    }

    public function getEditProduktCategory()
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $pageCategory = "b";
            $pageNumber = "b2";
            $categories = Category::all();
            $arr = ['pageNumber' => $pageNumber,
                    'pageCategory' => $pageCategory,
                    'categories' => $categories
                ];
            return view('admin.editProduktCategory', $arr);
        } else {
            return abort('404');
        }
    }

    public function getEditContactData(){
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $pageCategory = "b";
            $pageNumber = "b3";
            $arr = ['pageNumber' => $pageNumber, 'pageCategory' => $pageCategory];
            return view('admin.editContactData', $arr);
        } else {
            return abort('404');
        }
    }

    public function getCreateProduct(){
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $pageCategory = "shop";
            $pageNumber = "shop_1";
            $arr = ['pageNumber' => $pageNumber, 'pageCategory' => $pageCategory];
            return view('admin.createProduct', $arr);
        } else {
            return abort('404');
        }
    }

    public function getDeleteOrEditProduct(){
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $pageCategory = "shop";
            $pageNumber = "shop_2";
            $arr = ['pageNumber' => $pageNumber, 'pageCategory' => $pageCategory];
            return view('admin.deleteOrEditProduct', $arr);
        } else {
            return abort('404');
        }
    }

    public function getEditCompanyInfo(){
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $pageCategory = "aboutUs";
            $pageNumber = "aboutUs_1";
            $arr = ['pageNumber' => $pageNumber, 'pageCategory' => $pageCategory];
            return view('admin.editCompanyinfo', $arr);
        } else {
            return abort('404');
        }
    }

    public function getEditPersonalInfo(){
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $pageCategory = "aboutUs";
            $pageNumber = "aboutUs_2";
            $arr = ['pageNumber' => $pageNumber, 'pageCategory' => $pageCategory];
            return view('admin.editPersonalInfo', $arr);
        } else {
            return abort('404');
        }
    }

    public function getEditAwards(){
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $pageCategory = "awards";
            $pageNumber = "awards_1";
            $arr = ['pageNumber' => $pageNumber, 'pageCategory' => $pageCategory];
            return view('admin.editPersonalInfo', $arr);
        } else {
            return abort('404');
        }
    }

}
