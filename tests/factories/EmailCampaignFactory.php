<?php


use Faker\Generator;
use Spatie\EmailCampaigns\Models\EmailCampaign;

$factory->define(EmailCampaign::class, function (Generator $faker) {
    return [
        'name' => $faker->name,
        'subject' => $faker->sentence,
        'html' => $faker->randomHtml(),
        'track_opens' => $faker->boolean,
        'track_clicks' => $faker->boolean,
    ];
});

