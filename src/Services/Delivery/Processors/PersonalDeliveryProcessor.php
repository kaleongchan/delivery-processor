<?php

namespace App\Services\Delivery\Processors;

use App\Application;
use App\Contracts\Delivery\Processor;
use App\Contracts\Repositories\DeliveryRepository;

class PersonalDeliveryProcessor implements Processor
{
    public function process(array $order)
    {
        // @todo other processing

        return Application::make(DeliveryRepository::class)->create($order);
    }
}