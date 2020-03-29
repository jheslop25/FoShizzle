<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class messageController extends Controller
{
    public function create(Request $request){
        $msg = new \App\Message();
        $msg->user_id = Auth::user()->id;
        $msg->rec_id = $request->recID;
        $msg->msg = $request->msg;
        $msg->save();
        $sucess = 'success';
        return response($sucess);
    }

    public function getMsg(Request $request){
        //get all user messages
    }
}
