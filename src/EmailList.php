<?php

namespace Spatie\EmailCampaigns;

interface EmailList
{
    public function emails(): LazyCollection;
}
