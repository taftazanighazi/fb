<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    public $table = 'postings';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'isi'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
