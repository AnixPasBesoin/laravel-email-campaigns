<?php

namespace Spatie\EmailCampaigns\Models;

use Illuminate\Database\Eloquent\Model;

class EmailCampaignSendQueueItem extends Model
{
    public $table = 'email_campaign_send_queue';

    public $dates = ['sent_at'];

    public function markAsSent()
    {
        $this->sent_at = now();

        $this->save();

        return $this;
    }
}

