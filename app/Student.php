<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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
    public function scopeGroup($query,$temp){
        if((request()->has('group_id'))&&(request()->group_id!=null)){
        return $query->where('group_id',$temp);
        }else {
            return $query;
        }
    }
    public function scopeName($query, $temp){
        if((request()->has('first_name'))&&(request()->first_name!=null)){
        return $query->where('first_name',$temp);
        }
        else{
            return $query;
        }

    }
}
