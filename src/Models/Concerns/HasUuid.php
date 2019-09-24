<?php

namespace Spatie\EmailCampaigns\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function(Model $model){
            $model->uuid = Str::uuid();
        });
    }

    public static function findOrFailByUuid(string $uuid)
    {
        static::where('uuid', $uuid)->firstOrFail();
    }
}

