<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    protected $table="contact_people";
    public function company()
    {
        return $this->hasOne('\App\Company','id','company_id');
    }
}
