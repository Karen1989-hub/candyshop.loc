<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Discount;
use App\Models\HomePageSlider;
use App\Models\Category;
use App\Models\ContactData;
use App\Models\AboutCompany;
use App\Models\Employee;
use App\Models\Product;
use App\Models\News;

class AdminPagesController extends Controller
{
    public function getDiscountsPage()
    {
        $pageCategory = "a";
        $pageNumber = "a1";
        $discounts = Discount::all();
        $arr = ['pageNumber' => $pageNumber, 'pageCategory' => $pageCategory, 'discounts' => $discounts];
        return view('admin.home', $arr);
    }

    public function getEditSliderPage()
    {
        $pageCategory = "b";
        $pageNumber = "b1";
        $homePageSlider = HomePageSlider::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'homePageSlider' => $homePageSlider];
        return view('admin.еditSlider', $arr);
    }

    public function getEditProduktCategory()
    {
        $pageCategory = "b";
        $pageNumber = "b2";
        $categories = Category::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'categories' => $categories
        ];
        return view('admin.editProduktCategory', $arr);
    }

    public function getEditContactData()
    {
        $pageCategory = "b";
        $pageNumber = "b3";
        $contactData = ContactData::first();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'contactData' => $contactData
        ];
        return view('admin.editContactData', $arr);
    }

    public function getCreateProduct()
    {
        $pageCategory = "shop";
        $pageNumber = "shop_1";
        $categories = Category::all();
        $arr = ['pageNumber' => $pageNumber, 'pageCategory' => $pageCategory,
            'categories' => $categories];
        return view('admin.createProduct', $arr);
    }

    public function getDeleteOrEditProduct()
    {
        $pageCategory = "shop";
        $pageNumber = "shop_2";
        $products = Product::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'products' => $products];
        return view('admin.deleteOrEditProduct', $arr);
    }

    public function getEditCompanyInfo()
    {
        $pageCategory = "aboutUs";
        $pageNumber = "aboutUs_1";
        $companyInfo = AboutCompany::first();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'companyInfo' => $companyInfo];
        return view('admin.editCompanyInfo', $arr);
    }

    public function getEditPersonalInfo()
    {
        $pageCategory = "aboutUs";
        $pageNumber = "aboutUs_2";
        $employee = Employee::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'employee' => $employee];
        return view('admin.editPersonalInfo', $arr);
    }

    public function getEditAwards()
    {
        $pageCategory = "awards";
        $pageNumber = "awards_1";
        $awards = Award::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'awards' => $awards
        ];
        return view('admin.editAwards', $arr);
    }

    public function getEditNews()
    {
        $pageCategory = "news";
        $pageNumber = "news_1";
        $news = News::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'news' => $news
        ];
        return view('admin.editNews', $arr);
    }

    public function getMessagesList()
    {
        $pageCategory = "contacts";
        $pageNumber = "messagesList";
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory];
        return view('admin.messagesList', $arr);
    }

    public function getRetailOrdersList()
    {
        $pageCategory = "retailOrders";
        $pageNumber = "retailOrdersList";
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory];
        return view('admin.retailОrders', $arr);
    }

    public function getWholesalerOrdersList()
    {
        $pageCategory = "wholesalerOrders";
        $pageNumber = "wholesalerOrdersList";
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory];
        return view('admin.wholesalerОrders', $arr);
    }

    public function getWholesalersRegistration()
    {
        $pageCategory = "WholesalersRegistration";
        $pageNumber = "WholesalersRegistration";
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory];
        return view('admin.wholesalersRegistration', $arr);
    }

}
