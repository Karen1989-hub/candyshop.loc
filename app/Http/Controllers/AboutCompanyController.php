<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutCompany;
use App\Models\Employee;
use Illuminate\Support\Facades\Cookie;
use Validator;

//        $adminKey= Cookie::get('adminKey');
//        if ($adminKey == 'ak587238') {
//        } else {
//            return abort('404');
//        }

class AboutCompanyController extends Controller
{
    public function updaetCompanyInfo(Request $request){
        $adminKey= Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $title = $request->input('title');
            $text = $request->input('text');
            $file = $request->file('uploadImg');

            $validator = Validator::make($request->all(),
            ['title' => 'required | max:50',
             'text' => 'required | max:1000',
             'uploadImg' => 'required'
             ],
             [
              'title.required' => 'поле должно быт заполненно',
              'title.max' => 'поле должно быть не больше 50 синволов',
              'text.required' => 'поле должно быт заполненно',
              'text.max' => 'поле должно быть не больше 1000 синволов',
              'uploadImg.required' => 'поле должно быт заполненно'
             ]
            );
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $images = glob('images/aboutCompanyImg/*');
            foreach($images as $file){
                if(is_file($file)) {
                    unlink($file);
                }
            }

            $file->move('images/aboutCompanyImg', $file->getClientOriginalName());

            $update = AboutCompany::find(1);
            $update->title = $title;
            $update->text = $text;
            $update->imgName = $file->getClientOriginalName();
            $update->save();

            return redirect()->route('getEditCompanyInfo');
        } else {
            return abort('404');
        }

    }
    public function createNewEmployee(Request $request){
        $adminKey= Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $name = $request->input('name');
            $position = $request->input('position');
            $file = $request->file('uploadImg');

            $validator = Valdator::make($request->all(),
                ['title' => 'required | max:50',
                    'text' => 'required | max:1000',
                    'uploadImg' => 'required'
                ],[
                    'title.required' => 'поле должно быт заполненно',
                    'title.max' => 'поле должно быть не больше 50 синволов',
                    'text.required' => 'поле должно быт заполненно',
                    'text.max' => 'поле должно быть не больше 1000 синволов',
                    'uploadImg.required' => 'поле должно быт заполненно'
                ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            return redirect()->route('getEditPersonalInfo');
        } else {
            return abort('404');
        }
    }

}
