<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(App\Models\Customer_review::class, function (Faker $faker) {
    return [
        'en_name' => $faker->name,
        'ar_position' => $faker->name,
        'en_position' => $faker->name,
        'client_ar_review' => $faker->text(),
        'client_en_review' => $faker->text(),
       
    ];
});
