<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable=['student_id', 'subject_id','assess'];
    public $timestamps=false;
    public function student()
    {
        return $this->belongsTo('App\Student', 'user_id', 'id');
    }
    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id', 'id');
    }
}
