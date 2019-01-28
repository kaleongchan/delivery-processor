<?php

use App\Application;
use PHPUnit\Framework\TestCase;
use App\Services\Delivery\DeliveryService;


class DeliveryTest extends TestCase
{
    protected $service = null;

    public function setUp()
    {
        parent::setUp();

        $this->service = Application::make(DeliveryService::class);
    }

    /**
     * Test delivery with sample data.
     *
     * @return void
     */
    public function testDeliveryWithSampleData()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/orders.json'), true);

        $return = $this->service->processOrders($data);

        foreach($return as $processed) {
            $this->assertNotNull($processed);
            $this->assertArrayNotHasKey('error', $processed);
            $this->assertNotNull($processed['id']);
        }
    }

    /**
     * Test delivery with invalid type.
     *
     * @return void
     */
    public function testDeliveryWithInvalidType()
    {
        $exception = null;

        try {
            $data = $this->service->processOrder([
                'deliveryType' => 'invalid-type'
            ]);
        } catch (Exception $e) {
            $exception = $e;
        }

        $this->assertNotNull($exception);
        $this->assertInstanceOf(ReflectionException::class, $exception);
    }

    /**
     * Test delivery with invalid enterprise
     *
     * @return void
     */
    public function testDeliveryWithInvalidEnterprise()
    {
        // @todo

        $this->markTestIncomplete( 'This test has not been implemented yet.' );
    }

    /**
     * Test delivery with unsuccessful email campagin
     *
     * @return void
     */
    public function testDeliveryWithUnsuccessfulEmailCampaign()
    {
        // @todo

        $this->markTestIncomplete( 'This test has not been implemented yet.' );
    }
}
