<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourceDetail extends Model
{
    protected $table="student_cource_details";
    public function student()
    {
        return $this->hasOne('\App\User','id','student_id');
    }
    public function course()
   {
       return $this->hasOne('\App\CourceDetail','id','course_id');
   }
}
