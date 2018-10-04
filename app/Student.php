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
        return $this->belongsTo('App\Group');
    }

    public function assessment()
    {
        return $this->hasMany('App\Assessment', 'student_id', 'id');
    }
    public function image(){
        return $this->hasOne('App\Image','student_id','id');
    }
    public function scopeGroup($query,$group_id){
        return $query->where('group_id',$group_id);
    }
    public function scopeName($query,$first_name){
        return $query->where('first_name',$first_name);
    }
}
