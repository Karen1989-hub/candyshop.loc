<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class userController extends Controller
{
    public function createUser(Request $request)
    {
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $login = $request->input('login');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

        $validator = Validator::make($request->all(),
            [
                'firstName' => 'required|max:50',
                'lastName' => 'required|max:50',
                'email' => 'required|unique:users,email',
                'login' =>  'required|max:50|unique:users,login',
                'password' => 'required|confirmed',
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
                'password.confirmed' => 'повторный пароль не совпадает'
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $password = Hash::make($password);
        User::create(['firstName'=>$firstName,'lastName'=>$lastName,'email'=>$email,'login'=>$login,'password'=>$password]);

        Cookie::queue('userKey',User::max('id'),1440);
        return back();
    }
}
