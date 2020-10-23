<?php

class ProductIntegrationServiceTest extends \Raiadrogasil\Test\BaseTestCase
{
    private $mockProductDTO;

    private $mockPrice;

    private $mockStock;

    private $mockShipping;

    private $mockComposition;

    private $mockService;


    public function setUp(): void
    {
        parent::setUp();

        $this->mockProductDTO = Mockery::mock(App\Domain\DTO\ProductDTO::class)->makePartial();

        $this->mockComposition = Mockery::mock(\App\Services\Helper\Composition::class)->makePartial();
        $this->mockPrice = Mockery::mock(\App\Services\Connect\Microservice\Price::class)->makePartial();
        $this->mockStock = Mockery::mock(\App\Services\Connect\Microservice\Stock::class)->makePartial();
        $this->mockShipping = Mockery::mock(\App\Services\Connect\Microservice\Shipping::class)->makePartial();

        $this->mockService = Mockery::mock(\App\Services\ProductIntegrationService::class,[
            $this->mockComposition,
            $this->mockPrice,
            $this->mockStock,
            $this->mockShipping
        ])->makePartial();
    }

    public function testGetAllCheckout()
    {
        $this->mockComposition->shouldAllowMockingProtectedMethods()
        ->shouldReceive('getPrice', 'getStock', 'getShipping')
        ->andReturn(collect([]));

        $this->mockPrice
            ->shouldReceive('getProductPrice')
            ->andReturn([]);

        $this->mockStock
            ->shouldReceive('getProductStock')
            ->andReturn([]);

        $this->mockShipping
            ->shouldReceive('getProductShipping')
            ->andReturn([]);

        $this->assertIsArray($this->mockService->getAllCheckout($this->mockProductDTO));
    }

    public function testPriceStockShippingShouldReturnFalse()
    {
        $this->mockComposition->shouldAllowMockingProtectedMethods()
            ->shouldReceive('setPrice', 'setStock', 'setShipping')
            ->andReturn($this->mockComposition);

        $this->mockPrice
            ->shouldReceive('getProductPrice')
            ->andReturn(null);

        $this->mockStock
            ->shouldReceive('getProductStock')
            ->andReturn(null);

        $this->mockShipping
            ->shouldReceive('getProductShipping')
            ->andReturn(null);

        $this->mockComposition
            ->shouldReceive('checkoutProduct')
            ->andReturn([]);

        $this->assertIsArray($this->mockService->getAllCheckout($this->mockProductDTO));
    }
}
