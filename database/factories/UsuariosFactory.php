<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usuarios;
use Faker\Generator as Faker;

$factory->define(Usuarios::class, function (Faker $faker) {
    return [
        'persona_id'=>$faker->numberBetween(1,10),
        'nickname'=>$faker->word(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $faker->word(),
        'rol_id'=>$faker->numberBetween(1,2)
    ];
});
