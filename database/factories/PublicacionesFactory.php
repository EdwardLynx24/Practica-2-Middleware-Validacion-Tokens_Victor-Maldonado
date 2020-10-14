<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publicaciones;
use Faker\Generator as Faker;

$factory->define(Publicaciones::class, function (Faker $faker) {
    return [
        'persona_id'=>$faker->numberBetween(1,10),
        'titulo'=>$faker->word(),
        'texto'=>$faker->word()
    ];
});
