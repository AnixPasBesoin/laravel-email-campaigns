<?php


use Faker\Generator;

$factory->define(\Spatie\EmailCampaigns\Models\EmailCampaign::class, function (Generator $faker) {
    return [
        'name' => $faker->name,
        'html' => $faker->randomHtml(),
        'track_opens' => $faker->boolean,
        'track_clicks' => $faker->boolean,
    ];
});

