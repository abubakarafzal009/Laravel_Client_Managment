<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    public function student()
    {
        return $this->hasOne('App\User','id','student_id');
    }

}
