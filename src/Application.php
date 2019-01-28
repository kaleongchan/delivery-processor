<?php

namespace App;

use App\Contracts\Enterprise\Validator;
use App\Contracts\Marketing\MarketingService;
use App\Contracts\Repositories\DeliveryRepository;
use App\Repositories\DummyDeliveryRepository;
use App\Services\Enterprise\FooEnterpriseValidationService;
use App\Services\Marketing\BarMarketingService;
use ReflectionException;

/**
 * Simple implementation of service container.
 */
class Application
{
    /**
     * Bindings of interface and implementation
     *
     * @var array
     */
    protected static $bindings = [
        Validator::class => FooEnterpriseValidationService::class,
        MarketingService::class => BarMarketingService::class,

        DeliveryRepository::class => DummyDeliveryRepository::class
    ];

    /**
     * loaded instances.
     *
     * @var array
     */
    protected static $instances = [];

    /**
     * Create an instance of required class.
     *
     * @param string $class
     *
     * @return mixed
     */
    public static function make($class)
    {
        $class = self::$bindings[$class] ?? $class;

        if (isset(self::$instances[$class])) {
            return self::$instances[$class];
        }

        if (!class_exists($class)) {
            throw new ReflectionException("{$class} does not exist");
        }

        // cache loaded instances
        return (self::$instances[$class] = new $class());
    }
}