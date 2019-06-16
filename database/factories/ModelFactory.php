<?php

use Faker\Generator as Faker;

$factory->state(App\User::class, 'unconfirmed', function () {
    return [
        'confirmed' => false,
    ];
});

$factory->state(App\User::class, 'administrator', function () {
    return [
        'name' => 'admin',
    ];
});

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
        'confirmed'      => false,
    ];
});

$factory->define(App\Channel::class, function ($faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'slug' => $name,
    ];
});

$factory->define(App\Thread::class, function ($faker) {
    $title = $faker->sentence;

    return [
        'user_id'    => function () {
            return factory('App\User')->create()->id;
        },
        'channel_id' => function () {
            return factory('App\Channel')->create()->id;
        },
        'title'      => $title,
        'body'       => $faker->paragraph,
        'visits'     => 0,
        'slug'       => str_slug($title),
        'locked'     => false,
    ];
});


$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'thread_id' => function () {
            return factory('App\Thread')->create()->id;
        },
        'user_id'   => function () {
            return factory('App\User')->create()->id;
        },
        'body'      => $faker->paragraph,
    ];
});


