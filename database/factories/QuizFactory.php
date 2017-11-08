<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Quiz::class, function (Faker $faker) {
    $user = User::inRandomOrder()->first();

    return [
        'user_id' => $user->id,
        'name' => $faker->sentence( $faker->numberBetween(5, 15) )
    ];
});
