<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Personas;
use Faker\Generator as Faker;

$factory->define(Personas::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->word,
        'apellidoPaterno'=>$faker->word(),
        'apellidoMaterno'=>$faker->word(),
        'edad'=>$faker->numberBetween(15,40),
        'sexo'=>$faker->randomElement(['Masculino','Femenino'])
    ];
});
