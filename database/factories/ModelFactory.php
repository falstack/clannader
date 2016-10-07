<?php

$factory->define(App\Clannader\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'email' =>  $faker->safeEmail ,
        'zone' =>  $faker->word ,
        'avatar' =>  $faker->imageUrl($width = 60, $height = 60) ,
        'banner' =>  $faker->imageUrl($width = 900, $height = 400) ,
        'autograph' =>  $faker->word ,
        'password' =>  bcrypt($faker->password) ,
        'sex' =>  $faker->boolean ,
        'remember_token' =>  str_random(10) ,
    ];
});

$factory->define(App\Clannader\Models\Morph\Comment::class, function (Faker\Generator $faker) {
    return [
        'user_id' =>  $faker->randomNumber() ,
        'content' =>  $faker->text ,
        'hash' =>  $faker->word ,
        'link_id' =>  $faker->randomNumber() ,
        'link_type' =>  $faker->word ,
        'root_id' =>  $faker->randomNumber() ,
        'root_type' =>  $faker->word ,
        'target_id' =>  $faker->randomNumber() ,
        'talk' =>  $faker->randomNumber() ,
        'like' =>  $faker->randomNumber() ,
        'deleted_at' =>  $faker->dateTimeBetween() ,
    ];
});

$factory->define(App\Clannader\Models\Post\Post::class, function (Faker\Generator $faker) {
    $user_ids = \App\Clannader\Models\User::pluck('id')->toArray();
    $bangumi_ids = \App\Clannader\Models\Bangumi\Bangumi::pluck('id')->toArray();
    return [
        'bangumi_id' =>  $faker->randomElement($bangumi_ids) ,
        'user_id' => $faker->randomElement($user_ids),
        'name' =>  $faker->name ,
        'content' =>  $faker->text ,
    ];
});

$factory->define(App\Clannader\Models\Zone::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
    ];
});

$factory->define(App\Clannader\Models\Bangumi\Bangumi::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'summary' =>  $faker->word ,
        'avatar' =>  $faker->imageUrl($width = 60, $height = 60) ,
        'banner' =>  $faker->imageUrl($width = 900, $height = 400) ,
        'follower' =>  $faker->randomNumber() ,
        'score' =>  $faker->randomFloat(0.1, 10, 0) ,
    ];
});

