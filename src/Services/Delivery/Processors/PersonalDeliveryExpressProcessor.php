<?php

namespace App\Services\Delivery\Processors;

use App\Application;
use App\Contracts\Delivery\Processor;
use App\Contracts\Marketing\MarketingService;
use App\Contracts\Repositories\DeliveryRepository;
use App\Exceptions\Delivery\UnsuccessfulEmailCampaignException;

class PersonalDeliveryExpressProcessor implements Processor
{
    public function process(array $order)
    {
        $marketingService = Application::make(MarketingService::class);

        if (!$marketingService->verifyEmailCampaign($order['campaign'])) {
            throw new UnsuccessfulEmailCampaignException();
        }

        // @todo other processing

        return Application::make(DeliveryRepository::class)->create($order);
    }
}