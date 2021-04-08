<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutCompany;
use Illuminate\Support\Facades\Cookie;
use Validator;

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

            $images = glob('images/aboutCompanyImg/*'); // get all file names
            foreach($images as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file);// delete file
                }
            }

            $file->move('images/aboutCompanyImg', $file->getClientOriginalName());

            $update = AboutCompany::find(1);
            $update->title = $title;
            $update->text = $text;
            $update->imgName = $file->getClientOriginalName();
            $update->save();

            return back();
        } else {
            return abort('404');
        }

    }
    
}
