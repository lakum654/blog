<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'name'=>$faker->name(),
        'city'=>$faker->city(),
        'phone'=>$faker->phoneNumber,
    ];
});
