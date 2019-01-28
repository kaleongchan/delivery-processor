<?php

namespace App\Contracts\Delivery;

interface Processor
{
    public function process(array $order);
}