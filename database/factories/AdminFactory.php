<?php

use Faker\Generator as Faker;
use App\Models\Admin;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        //
        'nickname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('admin888'),
        'icon' => $faker->imageUrl(360,360)
    ];
});
