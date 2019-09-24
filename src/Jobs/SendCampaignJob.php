<?php

namespace Spatie\EmailCampaigns\Jobs;

use DOMDocument;
use DOMElement;
use Exception;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Spatie\EmailCampaigns\Actions\PersonalizeHtmlAction;
use Spatie\EmailCampaigns\Actions\PrepareEmailHtmlAction;
use Spatie\EmailCampaigns\EmailList;
use Spatie\EmailCampaigns\Models\EmailCampaign;
use Spatie\EmailCampaigns\Models\EmailSubscriber;
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
        $this
            ->prepareEmailHtml()
            ->prepareWebviewHtml()
            ->fillMailQueue()
            ->send();


        $this->makeLinksTrackable($this->campaign);
    }

    protected function prepareEmailHtml()
    {
        (new PrepareEmailHtmlAction())->execute($this->campaign);

        return $this;
    }

    private function prepareWebviewHtml()
    {
        return $this;
    }

    protected function send()
    {
        $this->emailList->emails()->each(function (EmailSubscriber $emailSubscriber) {
            $queueItem = $this->campaign->queue()->create([
                'email_subscriber_id' => $emailSubscriber->id,
            ]);

            $personalisedHtml = (new PersonalizeHtmlAction())->handle(
                $this->campaign->email_html,
                $emailSubscriber,
                $this->campaign,
            );

            try {
                Mail::raw($personalisedHtml, function(Message $message) use ($emailSubscriber) {
                    $message
                        ->to($emailSubscriber->email)
                        ->subject($this->campaign->subject);
                });

                $queueItem->markAsSent();
            } catch (Exception $exception)
            {
                //TODO add error to queue item;
            }

        });
    }
}

