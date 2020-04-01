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
        $convo = [];
        $msgSent = \App\Message::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $msgRec = \App\Message::where('rec_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        for($i = 0; $i < sizeof($msgSent + 1); $i++){
            array_push($convo, $msgSent[$i]);
            array_push($convo, $msgRec[$i]);
        }

        return response()->json(['convo' => $convo]);
    }
}
