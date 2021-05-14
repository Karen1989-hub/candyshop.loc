<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Message;

class MessagesController extends Controller
{
    public function createMessage(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        $validator = Validator::make($request->all(),
        [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required|max:2000'
        ],
            [
                'name.required' => 'поле должно быт заполненно',
                'name.max' => 'не больше 50 символов',
                'email.required' => 'поле должно быт заполненно',
                'email.email' => 'не коректный эл. адрес',
                'message.required' => 'поле должно быт заполненно',
                'message.max' => 'не больше 2000 символов',
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        Message::create(['name'=>$name,'email'=>$email,'message'=>$message]);

        return back();
    }

    public function deleteMessage($id){
        Message::destroy($id);
        return back();
    }

    public function getSingleMessage($id){
        $pageCategory = "contacts";
        $pageNumber = "messagesList";

        $update = Message::find($id);
        $update->readState = "readed";
        $update->save();

        $message = Message::find($id);
        $arr = ['pageNumber' => $pageNumber,
            'pageCategory' => $pageCategory,
            'message' => $message
        ];
        return view('admin.singleMessage',$arr);
    }
}
