<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CourceModule;
use App\StudentProgress;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Faker\Generator as Faker;

$factory->define(StudentProgress::class, function (Faker $faker) {
    return [
        'student_id'=>$faker->imageUrl(1, 10),
        'course_module'=>$faker->imageUrl(1, 10),
        'Grades'=>$faker->imageUrl(1, 10),
        
    ];
});
