<?php

namespace Spatie\EmailCampaigns\Actions;

use Spatie\EmailCampaigns\Models\EmailCampaign;
use Spatie\EmailCampaigns\Models\EmailSubscriber;

class PersonalizeHtmlAction
{
    public function handle($html, EmailSubscriber $emailSubscriber, EmailCampaign $emailCampaign) {
        // TODO personalize

        return $html;
    }
}

