<?php

namespace App\Services\Delivery\Processors;

use App\Application;
use App\Contracts\Delivery\Processor;
use App\Contracts\Enterprise\Validator;
use App\Contracts\Repositories\DeliveryRepository;
use App\Exceptions\Delivery\EnterpriseValidationFailedException;

class EnterpriseDeliveryProcessor implements Processor
{
    public function process(array $order)
    {
        $enterpriseValidator = Application::make(Validator::class);

        if (!$enterpriseValidator->validate($order['enterprise'])) {
            throw new EnterpriseValidationFailedException();
        }

        // @todo other processing

        return Application::make(DeliveryRepository::class)->create($order);
    }
}