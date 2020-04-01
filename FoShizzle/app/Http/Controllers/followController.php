<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class followController extends Controller
{
    public function follow(Request $request){
        //follow a user
        if(Auth::check()){
            $follow = new \App\Follow();
            $follow->user_id = Auth::user()->id;
            $follow->followed_id = $request->followed;
            if($follow->save()){
                return response()->json(['msg' => 'ok'], 200);
            } else {
                return response()->json(['msg'=> 'something went wrong'], 500);
            }
        }
    }

    public function unfollow(Request $request){
        //unfollow a user
        if(Auth::check()){
            if(\App\Follow::where('user_id', Auth::user()->id)->where('followed_id', $request->followed)->delete()){
                return response()->json(['msg' => 'unfollwed user'], 200);
            } else {
                return response()->json(['msg' => 'something went wrong'], 500);
            }
        } else {
            return response()->json(['msg' => 'please login'], 401);
        }
    }

    public function list(Request $request){
        //get a user's followers
        if(Auth::check()){
            $follows = \App\Follow::where('user_id', $request->user_id)->get();
            return response()->json(['follows' => $follows], 200);
        } else {
            return response()->json(['msg' => 'please login'], 401);
        }
    }
}
