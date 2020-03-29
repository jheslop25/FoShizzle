<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function create(Request $request){
        $note = new \App\Notification();
        $note->user_id = Auth::user()->id;
        $note->msg = $request->msg;
        $note->save();
        $msg = 'success';
        return response($msg);
    }

    public function get(Request $request){
        $note = new \App\Notification();
        $notes = $note->where('user_id', Auth::user()->id)->get();

        return response()->json($notes);
    }
}
