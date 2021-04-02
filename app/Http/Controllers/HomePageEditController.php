<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use App\Models\HomePageSlider;
use App\Models\ContactData;
use Validator;


class HomePageEditController extends Controller
{
    public function createSliderPage(Request $request)
    {
        //        $adminKey= Cookie::get('adminKey');
//        if ($adminKey == 'ak587238') {
//        } else {
//            return abort('404');
//        }

        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $title = $request->input('title');
            $text = $request->input('text');
            $file = $request->file('uploadImg');

            $validator = Validator::make($request->all(),
                ['title' => 'required | max:30',
                    'text' => 'required | max:50',
                    'uploadImg' => 'required'], [
                    'title.required' => 'поле должно быт заполненно',
                    'title.max' => 'поле должно быть не больше 40 синволов',
                    'uploadImg.required' => 'поле должно быт заполненно'
                ]
            );
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            HomePageSlider::create([
                'title' => $title, 'text' => $text
            ]);
            $maxId = HomePageSlider::max('id');
            $file->move('images/homePageSliderImg', $maxId . ".jpg");
            $update = HomePageSlider::find($maxId);
            $update->imgName = $maxId . ".jpg";
            $update->save();


        } else {
            return abort('404');
        }

        return redirect()->route('getEditSliderPage');
    }

    public function deleteSliderPage($id)
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $deletedSlide = HomePageSlider::find($id);
            $deletedFileName = $deletedSlide->imgName;
            unlink('images/homePageSliderImg/' . $deletedFileName);

            HomePageSlider::destroy($id);
            return redirect()->route('getEditSliderPage');
        } else {
            return abort('404');
        }
    }

    public function createCategory(Request $request)
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $title = $request->input('title');
            $file = $request->file('uploadImg');

            $validator = Validator::make($request->all(),
                [
                    'title' => 'required|max:20',
                    'uploadImg' => 'required'
                ], [
                    'title.required' => 'поле должно быт заполненно',
                    'title.max' => 'поле должно быть не больше 20 синволов',
                    'uploadImg.required' => 'поле должно быт заполненно'
                ]
            );
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            Category::create([
                'title' => $title
            ]);

            $maxId = Category::max('id');
            $file->move('images/categoriesImg', $maxId . ".jpg");
            $update = Category::find($maxId);
            $update->imgName = $maxId . ".jpg";
            $update->save();

            return redirect()->route('getEditProduktCategory');
        } else {
            return abort('404');
        }
    }

    public function deleteCategory($id)
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $deletedSlide = Category::find($id);
            $deletedFileName = $deletedSlide->imgName;
            unlink('images/categoriesImg/' . $deletedFileName);

            Category::destroy($id);
            return redirect()->route('getEditProduktCategory');
        } else {
            return abort('404');
        }
    }

    public function editContactData(Request $request)
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $adress = $request->input('address');
            $phone = $request->input('phone');
            $email = $request->input('email');

            $validator = Validator::make($request->all(),
            [
                'address' => 'required | max:50',
                'phone' => 'required | max:30',
                'email' => 'required | max:30'
            ],[
                'address.required' => 'поле должно быт заполненно',
                'address.max' => 'поле должно быть не больше 50 синволов',
                'phone.required' => 'поле должно быт заполненно',
                'phone.max' => 'поле должно быть не больше 30 синволов',
                'email.required' => 'поле должно быт заполненно',
                'email.max' => 'поле должно быть не больше 30 синволов'
                ]);
            if($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }

            $update = ContactData::find(1);
            $update->adress = $adress;
            $update->phone = $phone;
            $update->email = $email;
            $update->save();

            return redirect()->route('getEditContactData');
        } else {
            return abort('404');
        }
    }
}
