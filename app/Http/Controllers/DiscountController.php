<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Validator;
use App\Models\Discount;

class DiscountController extends Controller
{


    public function createDiscount(Request $request)
    {
//        $adminKey= Cookie::get('adminKey');
//        if ($adminKey == 'ak587238') {
//        } else {
//            return abort('404');
//        }

        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $text = $request->input('text');

            $validator = Validator::make($request->all(),
                ['text' => 'required | max:30'],
                ['text.required' => 'поле должно быт заполненно',
                    'text.max' => 'поле должно быть не больше 30 синволов'
                ]
            );

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            Discount::create(['text' => $text]);
            return redirect()->route('getDiscountsPage');
        } else {
            return abort('404');
        }


    }

    public function deleteDiscount($id)
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {

            Discount::destroy($id);
            return redirect()->route('getDiscountsPage');
        } else {
            return abort('404');
        }
    }
}
