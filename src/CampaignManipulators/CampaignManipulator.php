<?php

namespace Spatie\EmailCampaigns\CampaignManipulators;

use Spatie\EmailCampaigns\Models\EmailCampaign;

interface CampaignManipulator
{
    public function shouldRun(EmailCampaign $campaign): bool;

    public function manipulate(EmailCampaign $campaign): void;
}
