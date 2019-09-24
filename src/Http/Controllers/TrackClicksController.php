<?php

namespace Spatie\EmailCampaigns\Http\Controllers;

use Spatie\EmailCampaigns\Models\CampaignLink;
use Spatie\EmailCampaigns\Models\EmailSubscriber;

class TrackClicksController
{
    public function __invoke(CampaignLink $link, EmailSubscriber $subscriber = null)
    {
        if ($subscriber) {
            $link->registerClick($subscriber);
        }

        return redirect()->to($link->original_link);
    }
}

