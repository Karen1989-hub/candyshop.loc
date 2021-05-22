<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Validator;
use App\Models\Admin;



class AdminLoginController extends Controller
{
    public function getAdminLoginPage()
    {
        return view('admin.adminLogin');
    }

    public function checkAdminLogin(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        $validator = Validator::make($request->all(),
            ['login' => 'required',
             'password' => 'required'],
            ['login.required' => 'поле должно быт заполненно',
             'password.required' => 'поле должно быт заполненно']
        );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $result = Admin::where('login',$login)->where('password',$password)->get();

        if(count($result)>0){
            Cookie::queue('adminKey','ak587238',1440);
            return redirect()->route('getDiscountsPage');
        } else {
            $arr = ['adminloginError'=>'неправельный логин или пароль'];
            return view('admin.adminLogin',$arr);
        }
    }

    public function goOut(){
        Cookie::queue(
            Cookie::forget('adminKey')
        );

        return redirect()->route('home');
    }
}
