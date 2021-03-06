<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tweet(){
        return $this->hasMany('\App\Tweet');
    }

    public function like(){
        return $this->hasMany('\App\Like');
    }

    public function follow(){
        return $this->hasMany('\App\Follow');
    }

    public function comment(){
        return $this->hasMany('\App\Comment');
    }

    public function notification(){
        return $this->hasMany('\App\Notification');
    }

    public function message(){
        return $this->hasMany('\App\Message');
    }
}
