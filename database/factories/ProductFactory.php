<?php

use Faker\Generator as Faker;
use App\Product;


//vamos a definir un factory ($factory->define) para el modelo Product Product::class 
$factory->define(Product::class, function (Faker $faker) { //clase Faker
    return [
        
            'name' => substr($faker->sentence(3), 0, -1),
            'description' => $faker->sentence(10),
            'long_description' => $faker->text,
            'price' => $faker->randomFloat(2, 5, 150),

            'category_id' => $faker->numberBetween(1, 5)
    ];
});
