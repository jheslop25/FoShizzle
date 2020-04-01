<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function getUser(Request $request){
        //get user info for profile component
        if(Auth::check()){
            $id = $request->id;
            $user = \App\User::find($id);

            return response()->json(['user' => $user]);
        } else {
            return response()->json(['msg' => 'please login'], 401);
        }
    }

    public function update(Request $request){
        //update a user profile
        if(Auth::user()->id == $request->id){
            $user = \App\User::find(Auth::user()->id);
            $user->id = Auth::user()->id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->profile_pic = $request->photo;
            if($user->save()){
                $msg = 'user updated';
                return response($msg);
            }
        }
    }

    public function destroy(Request $request){
        //destroy a user, their tweets, and comments etc
        if (Auth::user()->id == $request->id){
            $user = Auth::user();
            $id = Auth::user()->id;
            \App\Tweet::where('user_id', $id)->delete();
            \App\Comment::where('user_id', $id)->delete();
            \App\Follow::where('user_id', $id)->delete();
            \App\Message::where('user_id', $id)->delete();

            return view('home');
        }
    }

    public function photo(){
        //a function to handle uploading a profile pic
    }
}
