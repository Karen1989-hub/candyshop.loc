<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Award;

class AwardController extends Controller
{
    public function createAwars(Request $request)
    {
        $uploadImg = $request->file('uploadImg');

        $validator = Validator::make($request->all(),
            [
                'uploadImg' => 'required'
            ],
            [
                'uploadImg.required' => 'файл не выбран'
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        Award::create(['imgName'=>null]);

        $maxId = Award::max('id');
        $uploadImg->move('images/awardImg', $maxId . ".jpg");
        $update = Award::find($maxId);
        $update->imgName = $maxId . ".jpg";
        $update->save();

        return back();
    }

    public function deleteAward($id){
        unlink("images/awardImg/".$id.".jpg");
        //unlink(asset("images/awardImg/".$id."jpg"));

        Award::destroy($id);

        return back();
    }
}
