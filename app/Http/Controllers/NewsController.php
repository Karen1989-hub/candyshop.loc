<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Validator;

class NewsController extends Controller
{
    public function createNews(Request $request)
    {
        $title = $request->input('title');
        $text = $request->input('text');
        $uploadImg = $request->input('uploadImg');

        $validator = Validator::make($request->all(),
            [
                'title' => 'required',
                'text' => 'required',
                'uploadImg' => 'required'
            ],
            [
                'title.required' => 'поле должно быт заполненно',
                'text.required' => 'поле должно быт заполненно',
                'uploadImg.required' => 'файл не выбран'
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        News::create(['title'=>$title,'text'=>$text]);

        return back();
    }
}
