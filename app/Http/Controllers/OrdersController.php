<?php

namespace App\Http\Controllers;

use App\Models\UserOrder;
use App\Models\UserOrderProduct;
use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class OrdersController extends Controller
{
    public function createUserOrder(Request $request)
    {
        $userId = Cookie::get('userKey');
        $address = $request->input('address');
        $payment = $request->input('payment');

        //UserOrder::create(['userId'=>$userId,'payment'=>$payment,'deliveryAddress'=>$address]);

        $userOrderBasket = Basket::where('userId', Cookie::get('userKey'))->get();

        foreach ($userOrderBasket as $val) {
            UserOrderProduct::create([
                'userOrderId' => $userId,
                'productId' => $val->productId,
                'productTitle' => $val->getSinglProduct()->title,
                'productSinglPrice' => $val->getSinglProduct()->price,
                'productAllPrice' => $val->productCount * $val->getSinglProduct()->price,
                'productCount' => $val->productCount,
            ]);
            Basket::where('userId',Cookie::get('userKey'))->delete();
        }
        return back();
    }
}
