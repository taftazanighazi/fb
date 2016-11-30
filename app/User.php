<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public  $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function postings()
    {
        return $this->hasMany('App\Posting');
    }


    public function friends()
    {
        return $this->hasMany('App\Friend');
    }
}
