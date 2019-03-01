<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word),  //ucfirst: palica mayuscula a la primer letra
        'description' => $faker->sentence(10)
    ];
});
