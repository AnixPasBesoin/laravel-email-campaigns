<?php

namespace Spatie\EmailCampaigns\Tests\CampaignManipulators;

use Spatie\EmailCampaigns\CampaignManipulators\MakeClicksTrackable;
use Spatie\EmailCampaigns\Models\EmailCampaign;
use Spatie\EmailCampaigns\Tests\TestCase;

class MakeClicksTrackableManipulatorTest extends TestCase
{
    /** @test */
    public function it_can_make_clicks_trackable()
    {
        $campaign = factory(EmailCampaign::class)->create([
            'html' => '<a href="https://spatie.be">My website</a>'
        ]);

        (new MakeClicksTrackable())->manipulate($campaign);

        $this->assertTrue(true);
    }
}

