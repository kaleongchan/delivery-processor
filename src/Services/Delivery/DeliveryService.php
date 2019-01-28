<?php

namespace App\Services\Delivery;

use App\Application;
use App\Contracts\Delivery\Processor;
use App\Exceptions\Delivery\DeliveryException;
use Exception;
use ReflectionException;

class DeliveryService
{
    /**
     * Process a list of orders
     *
     * @param array $orders
     *
     * @return array
     */
    public function processOrders(array $orders) : array
    {
        return array_map(function($order) {
            try {
                return $this->processOrder($order);
            } catch(ReflectionException $e) {
                return ['error' => 'Delivery type [' . $order['deliveryType'] . '] not supported'];
            } catch(DeliveryException $e) {
                return ['error' => $e->getMessage()];
            } catch (Exception $e) {
                return ['error' => 'Failed to process order'];
            }

        }, $orders);
    }

    /**
     * Process an order.
     *
     * @param array $order
     *
     * @return mixed
     */
    public function processOrder(array $order)
    {
        $processor = $this->getProcessorByDeliveryType($order['deliveryType']);

        return $processor->process($order);
    }

    /**
     * Get delivery processor instance by delivery type.
     *
     * @param string $deliveryType
     *
     * @return Processor
     */
    public function getProcessorByDeliveryType(string $deliveryType) : Processor
    {
        $class = 'App\\Services\\Delivery\\Processors\\' . ucfirst($deliveryType) . 'Processor';

        return Application::make($class);
    }
}