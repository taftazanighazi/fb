<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public $table = 'friends';
    protected $primaryKey = 'id';
    protected $fillable =['user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
