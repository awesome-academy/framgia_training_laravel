<?php

use Faker\Generator as Faker;
use App\Ticket;

$factory->define(Ticket::class, function (Faker $faker) {

    $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
    return [
        'title' => $title,
        'content' => $faker->text,
        'slug' => str_slug($title),
        'status' => rand(0,1),
        'user_id' => rand(1, 3)
    ];
});
