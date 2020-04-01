<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tweetController extends Controller
{
    public function create(Request $request)
    {
        //create a tweet
        if (Auth::check()) {
            $tweet = new \App\Tweet();
            $tweet->user_id = Auth::user()->id;
            $tweet->content = $request->content;
            $tweet->orig_user_id = $request->origUser;
            $tweet->orig_tweet_id = $request->tweetID;
            $tweet->photo_url = $request->photo;

            if ($tweet->save()) {
                $msg = "success! you created a tweet";
                return response($msg);
            }
        } else {
            return response()->json(['msg' => 'please login'], 401);
        }
    }

    public function update(Request $request)
    {
        //update a tweet
        if (Auth::check()) {
            $tweet = \App\Tweet::find($request->id);
            $tweet->user_id = Auth::user()->id;
            $tweet->content = $request->content;
            $tweet->orig_user_id = $request->origUser;
            $tweet->orig_tweet_id = $request->tweetID;
            $tweet->photo_url = $request->photo;

            if ($tweet->save()) {
                $msg = "success! you updated a tweet";
                return response($msg);
            }
        } else {
            return response()->json(['msg' => 'please login'], 401);
        }
    }

    public function delete(Request $request)
    {
        //delete a tweet
        if(Auth::check()){
            \App\Tweet::find($request->id)->delete();
            $msg = "you deleted a tweet";
            return response($msg);
        } else {
            return response()->json(['msg' => 'please login'], 401);
        }


    }

    public function get(Request $request)
    {
        //get a single tweet
        if (Auth::check()){
            $tweet = \App\Tweet::find($request->id);
            return response()->json($tweet);
        } else {
            return response()->json(['msg' => 'please login'], 401);
        }
    }

    public function getAll(Request $request)
    {
        //get all tweets and order by date created
        if (Auth::check()){
            $tweet = new \App\Tweet;
            $tweets = $tweet->all();
            return response()->json($tweets);
        } else {
            return response()->json(['msg' => 'please login'], 401);
        }
    }
}
