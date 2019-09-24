<?php

namespace Spatie\EmailCampaigns\CampaignManipulators;

use DOMDocument;
use DOMElement;
use Spatie\EmailCampaigns\Models\EmailCampaign;

class MakeClicksTrackable implements CampaignManipulator
{
    public function shouldRun(EmailCampaign $campaign): bool
    {
        return $campaign->track_clicks;
    }

    public function manipulate(EmailCampaign $campaign): void
    {
        $dom = new DOMDocument();

        $dom->loadHTML($campaign->html);

        collect($dom->getElementsByTagName('a'))
            ->each(function(DOMElement $linkElement) use ($campaign) {
                $originalHref = $linkElement->getAttribute('href');

                $campaignLink = $campaign->links()->create([
                    'original_link' => $originalHref,
                ]);

                $linkElement->setAttribute('href', $campaignLink->link);
            });

        $updatedHtml = $dom->saveHtml();

        dd($updatedHtml);
    }
}

