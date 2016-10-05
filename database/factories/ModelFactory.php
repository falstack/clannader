<?php

$factory->define(App\Clannader\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'email' =>  $faker->safeEmail ,
        'zone' =>  $faker->word ,
        'avatar' =>  $faker->imageUrl($width = 200, $height = 200) ,
        'banner' =>  $faker->imageUrl($width = 900, $height = 400) ,
        'autograph' =>  $faker->word ,
        'password' =>  bcrypt($faker->password) ,
        'sex' =>  $faker->boolean ,
        'remember_token' =>  str_random(10) ,
    ];
});
