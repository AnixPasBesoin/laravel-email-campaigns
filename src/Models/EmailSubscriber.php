<?php

namespace Spatie\EmailCampaigns\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EmailCampaigns\Models\Concerns\HasUuid;

class EmailSubscriber extends Model
{
    use HasUuid;

    protected $guarded = [];
}

