<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tweetController extends Controller
{
    public function create(Request $request){
        //create a tweet
        if(Auth::check()){
            $tweet = new \App\Tweet();
            $tweet->user_id = Auth::user()->id;
            $tweet->content = $request->content;
            $tweet->orig_user_id = $request->origUser;
            $tweet->orig_tweet_id = $request->tweetID;
            $tweet->photo_url = $request->photo;

            if($tweet->save()){
                $msg = "success! you created a tweet";
                return response($msg);
            }


        }
    }

    public function update(Request $request){
       //update a tweet
    }

    public function delete(Request $request){
        //delete a tweet
    }

    public function get(Request $request){
        //get a single tweet
    }

    public function getAll(Request $request){
        //get all tweets and order by date created
    }
}
