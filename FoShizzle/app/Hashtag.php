<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    public function tweet(){
        return $this->belongsTo('\App\Tweet');
    }
}
