<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use App\Models\HomePageSlider;
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
            unlink('images/homePageSliderImg/'.$deletedFileName);

            HomePageSlider::destroy($id);
            return redirect()->route('getEditSliderPage');
        } else {
            return abort('404');
        }
    }

    public function createCategory(){}
}
