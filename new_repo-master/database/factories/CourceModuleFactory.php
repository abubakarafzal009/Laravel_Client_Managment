<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CourceDetail;
use App\CourceModule;
use Faker\Generator as Faker;

$factory->define(CourceModule::class, function (Faker $faker) {
    $number=1;
    return [
        'Module_Name'=>$faker->sentence,
        'Level'=>$faker->imageUrl(1, 10),
        'course_id'=>$faker->$number
    ];
});
