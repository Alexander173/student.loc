<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
     protected $fillable=['group_name', 'description'];
    public $timestamps=false;
     public function student()
   {
        return $this->hasMany('App\Student', 'group_id', 'id');
   }
   public function assessment()
   {
         return $this->hasManyThrough(
             'App\Assessment','App\Student',
             'group_id','student_id','id');
   }
}
