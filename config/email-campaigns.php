<?php

return [
    'manipulators' => [
        \Spatie\EmailCampaigns\CampaignManipulators\MakeClicksTrackable::class,
        \Spatie\EmailCampaigns\Http\Controllers\TrackOpensController::class,
    ],
];
