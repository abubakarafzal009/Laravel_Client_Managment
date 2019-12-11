<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CourceDetail;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Faker\Generator as Faker;

$factory->define(CourceDetail::class, function (Faker $faker) {
    return [
        'course_name'=>$faker->sentence,
       
    ];
});
