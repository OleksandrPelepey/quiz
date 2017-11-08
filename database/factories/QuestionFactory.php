<?php

use App\Quiz;
use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    $quiz = Quiz::inRandomOrder()->first();
    $answers = array();

    $answers_count = $faker->numberBetween(3, 7);
    $correct_answers_count = $faker->numberBetween(1, $answers_count - 1);

    for ($i=0; $i < $answers_count; $i++) { 
        $answers[$i]['text'] = $faker->sentence( $faker->numberBetween(6, 15) );
        $answers[$i]['is_correct'] = !!$faker->numberBetween(0, 1);
    }

    return [
        'quiz_id' => $quiz->id,
        'body' => $faker->text(100),
        'answers' => json_encode($answers)
    ];
});
