<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class likeController extends Controller
{
    public function likeTweet(Request $request){
        //like a tweet
        if(Auth::check()){
            $like = new \App\Like();
            $like->tweet_id = $request->likeTweet;
            $like->user_id = Auth::user()->id;
            if($like->save()){
                return response()->json(['status' => 200]);
            }
        } else {
            return response()->json(['msg' => 'please login'], 401);
        }
    }

    public function unlikeTweet(Request $request){
        //unlike a tweet
        if(Auth::check()){
            if(\App\Tweet::find($request->tweetId)->delete()){
                return response()->json(['status'=>200]);
            }

        } else {
            return response()->json(['msg' => 'please login'], 401);
        }
    }

    public function likeComment(Request $request){
        //like a comment
        if(Auth::check()){

        } else {
            return response()->json(['msg' => 'please login'], 401);
        }
    }

    public function unlikeComment(Request $request){
        //unlike a comment
        if(Auth::check()){

        } else {
            return response()->json(['msg' => 'please login'], 401);
        }
    }
}
