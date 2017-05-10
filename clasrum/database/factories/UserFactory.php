<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'mother_last_name' => $faker->lastName,
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


/*
 CONTRUIR LO NECESARIO PARA QUE LOS TESTS PASEN :d
*/