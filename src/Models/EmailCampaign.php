<?php

namespace Spatie\EmailCampaigns\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\EmailCampaigns\EmailList;
use Spatie\EmailCampaigns\Enums\EmailCampaignStatus;

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

    public function send(EmailList $emailList)
    {

    }

    public function links(): HasMany
    {
        return $this->hasMany(CampaignLink::class);
    }
}

