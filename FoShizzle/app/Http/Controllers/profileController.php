<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public function getUser(Request $request){
        //get user info for profile component
    }

    public function update(Request $request){
        //update a user profile
    }

    public function destroy(Request $request){
        //destroy a user, their tweets, and comments etc
    }
}
