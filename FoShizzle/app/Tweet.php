<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public function user(){
        return $this->belongsTo('\App\User');
    }

    public function comment(){
        return $this->hasMany('\App\Comment');
    }

    public function like(){
        return $this->hasMany('\App\Like');
    }

    public function hashtag(){
        return $this->hasMany('\App\Hashtag');
    }
}
