<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Discount;
use App\Models\HomePageSlider;
use App\Models\Category;
use App\Models\ContactData;
use App\Models\AboutCompany;
use App\Models\Employee;
use App\Models\Product;

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
            $contactData = ContactData::first();
            $arr = ['pageNumber' => $pageNumber,
                    'pageCategory' => $pageCategory,
                    'contactData' => $contactData
                ];
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
            $categories = Category::all();
            $arr = ['pageNumber' => $pageNumber, 'pageCategory' => $pageCategory,
                'categories'=>$categories];
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
            $products = Product::all();
            $arr = ['pageNumber' => $pageNumber,
                    'pageCategory' => $pageCategory,
                    'products' => $products];
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
            $companyInfo = AboutCompany::first();
            $arr = ['pageNumber' => $pageNumber,
                    'pageCategory' => $pageCategory,
                    'companyInfo' => $companyInfo];
            return view('admin.editCompanyInfo', $arr);
        } else {
            return abort('404');
        }
    }

    public function getEditPersonalInfo(){
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $pageCategory = "aboutUs";
            $pageNumber = "aboutUs_2";
            $employee = Employee::all();
            $arr = ['pageNumber' => $pageNumber,
                    'pageCategory' => $pageCategory,
                    'employee' => $employee];
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
            $arr = ['pageNumber' => $pageNumber,
                    'pageCategory' => $pageCategory];
            return view('admin.editPersonalInfo', $arr);
        } else {
            return abort('404');
        }
    }

}
