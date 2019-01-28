<?php

namespace App\Exceptions\Delivery;

class EnterpriseValidationFailedException extends DeliveryException
{
    public function __construct($message = 'Order cannot be processed due to failure of enterprise validation')
    {
        parent::__construct($message);
    }
}
