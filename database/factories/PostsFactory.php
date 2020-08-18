<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\Posts;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'tipo_de_usuario' => $faker->title,
        'titulo' => $faker->title,
        'imagem-url'=> $faker->title,
        'descricao' => $faker->paragraph,
        'texto' => $faker->title,
        'autor' => $faker->title,
    ];
});
