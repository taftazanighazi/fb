<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public $table = 'users_friends';
    protected $primaryKey = 'id';
    protected $fillable =['user_id'];

    public function users()
    {
        return $this->belongsToMany('App\User','users_friends','user_id','friend_id');
    }
}
