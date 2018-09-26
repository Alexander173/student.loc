<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
     protected $fillable=['subject_name'];
    public $timestamps=false;
    public function assessment()
    {
        return $this->hasMany('App\Assessment', 'subject_id', 'id');
    }
}
