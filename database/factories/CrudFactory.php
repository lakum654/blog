<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Crud;
use Faker\Generator as Faker;

$factory->define(App\Crud::class, function (Faker $faker) {
    return [
        "name"=>$faker->name(),
        "city"=>$faker->randomElement(['surat','chotila','rajkot','baruch'])
    ];
});
