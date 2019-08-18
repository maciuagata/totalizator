<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
            'title' =>$faker->name,
            'game_start_time' =>$faker->dateTime,
            'status'=>$faker->randomElement($array = array ('win','set','stopped')),
            'winning_outcome_id'=>$faker->randomDigitNotNull,
    ];
});
