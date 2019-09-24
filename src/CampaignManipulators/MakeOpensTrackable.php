<?php

namespace Spatie\EmailCampaigns\CampaignManipulators;

use Spatie\EmailCampaigns\Models\EmailCampaign;

class MakeOpensTrackable implements CampaignManipulator
{
    public function shouldRun(EmailCampaign $campaign): bool
    {
        return $campaign->track_opens;
    }

    public function manipulate(EmailCampaign $campaign): void
    {
        // TODO: Implement manipulate() method.
    }
}

