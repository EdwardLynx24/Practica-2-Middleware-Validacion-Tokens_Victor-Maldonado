<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentarios;
use Faker\Generator as Faker;

$factory->define(Comentarios::class, function (Faker $faker) {
    return [
        'usuario_id'=>$faker->numberBetween(1,10),
        'publicacion_id'=>$faker->numberBetween(1,10),
        'texto'=>$faker->word()
    ];
});
