<?php

use App\Models\Module;
use App\Models\Quiz;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {

    $moduleIds = Module::pluck('id');
    $moduleCount = Module::all()->count();

    return [


        'title' => rtrim($faker->sentence(rand(1,3)),"."),
        'body' =>  rtrim($faker->paragraph(rand(3,7),true),"."),
        'publish' => rand(0,1),
        'published_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null)->format('Y-m-d H:i:s')        ,
        'time' => date('H:i:s', rand(500,1000)),
        'views_count' => rand(0,1000),
        'votes_count' => rand(-1000,1000),
        'module_id' => $moduleCount > 0 ? $moduleIds->random() : null,
        'user_id' => User::pluck('id')->random(),
    ];
});
