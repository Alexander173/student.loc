<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   // protected $table='students';
    protected $fillable=['first_name', 'middle_name', 'last_name', 'date_of_birthday', 'group_id'];
    public $timestamps=false;
  
    public function group()
    {
        return $this->belongsTo('Add\Group');
    }

    public function assessment()
    {
        return $this->hasMany('App\Assessment', 'student_id', 'id');
    }

    
}