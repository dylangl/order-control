<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('admin123456'),
        'full_name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'group_id' => rand(1, 5),
        'status' => rand(0, 2),
        'reg_ip' => $faker->ipv4,
        'last_time' => $faker->unixTime,
        'last_ip' => $faker->ipv4,
        'is_deleted' => 0,
        'remember_token' => str_random(10),
    ];
});
