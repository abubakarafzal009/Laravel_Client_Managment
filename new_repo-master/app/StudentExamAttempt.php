<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class StudentExamAttempt extends Model
{
    public function user()
    {
        return $this->hasOne('App\User','id','student_id');
    }
}
