<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StudentCourceDetail;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Faker\Generator as Faker;

$factory->define(StudentCourceDetail::class, function (Faker $faker) {
    $number=1;
    return [
        'student_id'=>$faker->$number,
        'course_id'=>$faker->$number
    ];
});
