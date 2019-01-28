<?php

namespace App\Exceptions\Delivery;

class UnsuccessfulEmailCampaignException extends DeliveryException
{
    public function __construct($message = 'Order cannot be processed due to unsuccessful email campaign')
    {
        parent::__construct($message);
    }
}
