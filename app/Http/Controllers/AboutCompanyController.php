<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    public function updaetCompanyInfo(Request $request){
        $title = $request->input('title');
        $text = $request->input('text');


        return back();
    }
}
