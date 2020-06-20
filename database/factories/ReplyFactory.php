<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'user_id' => function () {
            return \App\Models\User::inRandomOrder()->limit(1)->get()->first()->id;
        },
        'thread_id' => function () {
            return \App\Models\Thread::inRandomOrder()->limit(1)->get()->first()->id;
        }
    ];
});
