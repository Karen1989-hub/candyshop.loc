<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutCompany;
use App\Models\Employee;
use Illuminate\Support\Facades\Cookie;
use Validator;
use App\Models\Galery;


class AboutCompanyController extends Controller
{
    public function updaetCompanyInfo(Request $request)
    {
        $adminKey = Cookie::get('adminKey');
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
            foreach ($images as $file) {
                if (is_file($file)) {
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

    public function createNewEmployee(Request $request)
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
            $name = $request->input('name');
            $position = $request->input('position');
            $file = $request->file('uploadImg');
            $imgName = $file->getClientOriginalName();

            $validator = Validator::make($request->all(),
                ['name' => 'required | max:50',
                    'position' => 'required | max:1000',
                    'uploadImg' => 'required'
                ], [
                    'name.required' => 'поле должно быт заполненно',
                    'name.max' => 'поле должно быть не больше 50 синволов',
                    'position.required' => 'поле должно быт заполненно',
                    'position.max' => 'поле должно быть не больше 1000 синволов',
                    'uploadImg.required' => 'поле должно быт заполненно'
                ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $file->move('images/employeesImg', $file->getClientOriginalName());

            Employee::create(['name' => $name, 'position' => $position, 'imgName' => $imgName]);

            return redirect()->route('getEditPersonalInfo');
        } else {
            return abort('404');
        }
    }

    public function deleteEmployee($id)
    {
        $adminKey = Cookie::get('adminKey');
        if ($adminKey == 'ak587238') {
           $obj = Employee::where('id',$id)->get();
            unlink('images/employeesImg/'.$obj[0]->imgName);
            Employee::destroy($id);
            return redirect()->route('getEditPersonalInfo');
        } else {
            return abort('404');
        }

    }

    public function createNewGaleryImg(Request $request){
        $file = $request->file('uploadImg');
        $imgName = $file->getClientOriginalName();
        $file->move('images/galery',$imgName);
        Galery::create(['imgName'=>$imgName]);
        return back();
    }

    public function deleteGaleryImg($id){
        $imgName = Galery::where('id',$id)->first()->imgName;
       unlink('images/galery/'.$imgName);

       Galery::destroy($id);
       return back();
    }



}
