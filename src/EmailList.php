<?php

namespace Spatie\EmailCampaigns;

use Illuminate\Support\LazyCollection;

interface EmailList
{
    public function emails(): LazyCollection;
}
