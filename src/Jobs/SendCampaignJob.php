<?php

namespace Spatie\EmailCampaigns\Jobs;

use DOMDocument;
use DOMElement;
use Spatie\EmailCampaigns\EmailList;
use Spatie\EmailCampaigns\Models\EmailCampaign;
use Symfony\Component\DomCrawler\Crawler;

class SendCampaignJob
{
    /** @var \Spatie\EmailCampaigns\Models\EmailCampaign */
    public $campaign;

    /** @var \Spatie\EmailCampaigns\EmailList */
    public $emailList;

    public function __construct(EmailCampaign $campaign, EmailList $emailList)
    {
        $this->campaign = $campaign;

        $this->emailList = $emailList;
    }

    public function handle()
    {
        $this->makeLinksTrackable($this->campaign);
    }
}

