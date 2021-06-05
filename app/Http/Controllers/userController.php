<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\Basket;

class userController extends Controller
{
    public function createUser(Request $request)
    {
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $login = $request->input('login');
        $password = $request->input('password');
        $telephon = $request->input('telephon');
        $password_confirmation = $request->input('password_confirmation');

        $validator = Validator::make($request->all(),
            [
                'firstName' => 'required|max:50',
                'lastName' => 'required|max:50',
                'email' => 'required|unique:users,email',
                'login' => 'required|max:50|unique:users,login',
                'password' => 'required|confirmed',
                'telephon' => 'required|max:30',
            ], [
                'firstName.required' => 'поле должно быт заполненно',
                'firstName.max' => 'поле должно быть не больше 50 синволов',
                'lastName.required' => 'поле должно быт заполненно',
                'lastName.max' => 'поле должно быть не больше 50 синволов',
                'email.required' => 'поле должно быт заполненно',
                'email.unique' => 'эта почта уже зарегистрированa',
                'login.required' => 'поле должно быт заполненно',
                'login.max' => 'поле должно быть не больше 50 синволов',
                'login.unique' => 'этот логин уже зарегистрирован',
                'password.required' => 'поле должно быт заполненно',
                'password.confirmed' => 'повторный пароль не совпадает',
                'telephon.required' => 'поле должно быт заполненно',
                'telephon.max' => 'поле должно быть не больше 30 синволов',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $password = Hash::make($password);
        User::create(['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email,'telephon'=>$telephon, 'login' => $login, 'password' => $password]);

        Cookie::queue('userKey', User::max('id'), 1440);
        return back();
    }

    public function signUp()
    {
        Cookie::queue(Cookie::forget('userKey'));
        return back();
    }

    public function signIn(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        $validator = Validator::make($request->all(),
            [
                'login' => 'required',
                'password' => 'required',
            ], [
                'login.required' => 'поле должно быт заполненно',
                'password.required' => 'поле должно быт заполненно',
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $row = User::where('login', $login)->get();

        if (count($row) > 0) {
            if (Hash::check($password, $row[0]->password)) {
                Cookie::queue('userKey', $row[0]->id, 1440);
                Cookie::queue(Cookie::forget('userRegistrationError'));
                return back();
            } else {
                Cookie::queue('userRegistrationError', 'неправельный логин или пароль', 1);
                return redirect()->route('userRegistrationPage');
            }
        } else {
            Cookie::queue('userRegistrationError', 'неправельный логин или пароль', 1);
            return redirect()->route('userRegistrationPage');
        }
    }

    public function addInBasket(Request $request,$id){
        if (Cookie::get('userKey') != false) {
            $availabilityProduct = Basket::where('userId',Cookie::get('userKey'))->where('productId',$id)->get();
            if(count($availabilityProduct)>0){
                return back();
            } else {
                $countInStock = Product::where('id',$id)->first()->countInStock;
                //ստուգում և հանւմ եմ ապրանքը պահեստից
                if($countInStock - 1 >= 0){
                    Basket::create(['userId'=>Cookie::get('userKey'),'productId'=>$id]);
                    $update = Product::find($id);
                    $update->countInStock = $countInStock - 1;
                    $update->save();
                    return back();
                } else {
                    return redirect()->route('errorAboutCountInStock');
                }

            }

        } else {
            return redirect()->route('userRegistrationPage');
        }
    }

    public function updateInBasket(Request $request){
        $productId = $request->input('productId');
        $productCount = $request->input('productCount');



        $update = Basket::where('productId',$productId)->where('userId',Cookie::get('userKey'))->first();
        $update->productCount = $productCount;
        $update->save();
        return back();
    }

    public function deleteInBasket($id){
        $userId = Cookie::get('userKey');
        Basket::where('userId',$userId)->where('productId',$id)->delete();
        return back();
    }
}
