<?php

namespace Spatie\EmailCampaigns\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\EmailCampaigns\EmailList;
use Spatie\EmailCampaigns\Enums\EmailCampaignStatus;
use Spatie\EmailCampaigns\Jobs\SendCampaignJob;

class EmailCampaign extends Model
{
    protected $guarded = [];

    public $casts = [
        'track_opens' => 'bool',
        'track_clicks' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function(EmailCampaign $emailCampaign) {
            $emailCampaign->status = EmailCampaignStatus::CREATED;
        });
    }

    public function links(): HasMany
    {
        return $this->hasMany(CampaignLink::class);
    }

    public function queue(): HasMany
    {
        return $this->hasMany(EmailCampaignSendQueueItem::class);
    }

    public function trackOpens()
    {
        $this->update(['track_opens' => true]);

        return $this;
    }

    public function trackClicks()
    {
        $this->update(['track_clicks' => true]);

        return $this;
    }

    public function sendTo(EmailList $emailList)
    {
        dispatch(new SendCampaignJob($this, $emailList));
    }


}

