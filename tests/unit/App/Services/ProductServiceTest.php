<?php

class ProductServiceTest extends \Raiadrogasil\Test\BaseTestCase
{
    private $mockProductDTO;

    private $mockProductIntegrationService;

    private $mockService;


    public function setUp(): void
    {
        parent::setUp();

        $this->mockProductDTO = Mockery::mock(App\Domain\DTO\ProductDTO::class)->makePartial();

        $this->mockProductIntegrationService = Mockery::mock(App\Services\ProductIntegrationService::class)->makePartial();

        $this->mockService = Mockery::mock(\App\Services\ProductService::class,[
            $this->mockProductIntegrationService,
        ])->makePartial();
    }

    public function testGetAll()
    {
        $this->mockProductIntegrationService
            ->shouldReceive('getAllCheckout')
            ->andReturn([]);

        $this->assertIsArray($this->mockService->getAll($this->mockProductDTO));
    }
}
