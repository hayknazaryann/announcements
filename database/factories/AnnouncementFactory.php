<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Announcement;
use Faker\Generator as Faker;

$factory->define(Announcement::class, function (Faker $faker) {
    return [
        'title' => $this->faker->sentence,
        'description' => $this->faker->text,
        'image_urls' => [
            [
                'value' => $this->faker->imageUrl()
            ]
        ],
        'price' => $this->faker->randomDigitNotNull
    ];
});
