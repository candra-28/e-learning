<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Announcement;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Announcement::class, function (Faker $faker) {
    return [
        'acm_title' => $faker->name,
        'acm_user_id' => 1,
        'acm_slug'  => str::slug($faker->name),
        'acm_description' => $faker->address,
        'acm_is_active' => 1,
        'acm_upload_type' => 'vendor/be/assets/images/announcements/test.jpg',
    ];
});
