<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Docente\Periodo;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Periodo::class, function (Faker $faker) {
    return [
        'periodo_desde'=>$faker->creditCardExpirationDate,
        'periodo_hasta'=>$faker->creditCardExpirationDate,
        'fecha_inicio'=>$faker->creditCardExpirationDate,
        'resultado'=>$faker->biasedNumberBetween(0,30),
        'estatus'=>$faker->randomElement(['activo','regular','inactivo']),
    ];
});
