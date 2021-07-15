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
use App\Models\Message;
use App\Models\UserOrder;
use App\Models\UserOrderProduct;
use App\Models\Restrictions;


class AdminPagesController extends Controller
{
    public function getDiscountsPage()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "a";
        $pageNumber = "a1";
        $discounts = Discount::all();
        $arr = ['pageNumber' => $pageNumber,
                'pageCategory' => $pageCategory,
                'discounts' => $discounts,
                'noReadedMessagesCount' => $noReadedMessagesCount,
            ];
        return view('admin.home', $arr);
    }

    public function getEditSliderPage()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "b";
        $pageNumber = "b1";
        $homePageSlider = HomePageSlider::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'homePageSlider' => $homePageSlider];
        return view('admin.editSlider', $arr);
    }

    public function getEditProduktCategory()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "b";
        $pageNumber = "b2";
        $categories = Category::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'categories' => $categories,
            'noReadedMessagesCount' => $noReadedMessagesCount,
        ];
        return view('admin.editProduktCategory', $arr);
    }

    public function getEditContactData()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "b";
        $pageNumber = "b3";
        $contactData = ContactData::first();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'contactData' => $contactData,
            'noReadedMessagesCount' => $noReadedMessagesCount,
        ];
        return view('admin.editContactData', $arr);
    }

    public function getCreateProduct()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "shop";
        $pageNumber = "shop_1";
        $categories = Category::all();
        $arr = ['pageNumber' => $pageNumber, 'pageCategory' => $pageCategory,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'categories' => $categories];
        return view('admin.createProduct', $arr);
    }

    public function getDeleteOrEditProduct()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "shop";
        $pageNumber = "shop_2";
        $products = Product::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'products' => $products];
        return view('admin.deleteOrEditProduct', $arr);
    }

    public function getEditCompanyInfo()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "aboutUs";
        $pageNumber = "aboutUs_1";
        $companyInfo = AboutCompany::first();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'companyInfo' => $companyInfo];
        return view('admin.editCompanyInfo', $arr);
    }

    public function getEditPersonalInfo()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "aboutUs";
        $pageNumber = "aboutUs_2";
        $employee = Employee::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'employee' => $employee];
        return view('admin.editPersonalInfo', $arr);
    }

    public function getEditAwards()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "awards";
        $pageNumber = "awards_1";
        $awards = Award::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'awards' => $awards
        ];
        return view('admin.editAwards', $arr);
    }

    public function getEditNews()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "news";
        $pageNumber = "news_1";
        $news = News::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'news' => $news
        ];
        return view('admin.editNews', $arr);
    }

    public function getMessagesList()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "contacts";
        $pageNumber = "messagesList";
        $message = Message::all();
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'message' => $message
        ];
        return view('admin.messagesList', $arr);
    }

    public function getRetailOrdersList()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "retailOrders";
        $pageNumber = "retailOrdersList";
        $userOrder = UserOrder::where('userType','retail')->get();
        $arr = [
            'pageNumber' => $pageNumber,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'pageCategory' => $pageCategory,
            'userOrder' => $userOrder,
            ];
        return view('admin.retailOrders', $arr);
    }

    public function getSinglRetailOrdersList($id=null){
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "retailOrders";
        $pageNumber = "retailOrdersList";
        $userOrder = UserOrder::where('id',$id)->get();
        $arr = [
            'pageNumber' => $pageNumber,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'pageCategory' => $pageCategory,
            'userOrder' => $userOrder,
        ];
        //return $id;
        return view('admin.singlRetailOrder', $arr);
    }

    public function getWholesalerOrdersList()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "wholesalerOrders";
        $pageNumber = "wholesalerOrdersList";
        $userOrder = UserOrder::where('userType','wholesaler')->get();
        $arr = ['pageNumber' => $pageNumber,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'pageCategory' => $pageCategory,
            'userOrder' => $userOrder,
            ];
        return view('admin.wholesalerOrders', $arr);
    }

    public function singWholesalerOrders($id){
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "wholesalerOrders";
        $pageNumber = "wholesalerOrdersList";
        $userOrder = UserOrder::where('id',$id)->get();
        $arr = [
            'pageNumber' => $pageNumber,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'pageCategory' => $pageCategory,
            'userOrder' => $userOrder,
        ];
        //return $id;
        return view('admin.singlWholesalerOrders', $arr);
    }

    public function getWholesaleRestrictions(){
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "wholesalerOrders";
        $pageNumber = "wholesalerRestrictions";
        $minSaleCountForWholesaler = Restrictions::find(1)->minSaleCountForWholesaler;

        $arr = ['pageNumber' => $pageNumber,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'pageCategory' => $pageCategory,
            'minSaleCountForWholesaler' => $minSaleCountForWholesaler,
        ];
        return view('admin.wholesaleRestrictions', $arr);
    }

    public function updateMinSaleCountForWholesaler(Request $request){
        $newData = $request->input('count');
        $update = Restrictions::find(1);
        $update->minSaleCountForWholesaler = $newData;
        $update->save();
        return back();
    }

    public function getWholesalersRegistration()
    {
        $noReadedMessagesCount = Message::where('readState', 'no readed')->count();
        $pageCategory = "WholesalersRegistration";
        $pageNumber = "WholesalersRegistration";
        $arr = ['pageNumber' => $pageNumber,
            'noReadedMessagesCount' => $noReadedMessagesCount,
            'pageCategory' => $pageCategory];
        return view('admin.wholesalersRegistration', $arr);
    }

}
