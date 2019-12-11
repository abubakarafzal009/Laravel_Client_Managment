<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourceModule extends Model
{
    protected $table="cource_modules";
    public function student()
    {
        return $this->hasOne('\App\User','id','student_id');
    }
   
}
