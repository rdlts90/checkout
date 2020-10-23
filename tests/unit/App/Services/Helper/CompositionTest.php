<?php

use App\Services\Helper\Composition;

class CompositionTest extends \Raiadrogasil\Test\BaseTestCase
{
    private $mockComposition;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockComposition = Mockery::mock(Composition::class)->makePartial();
    }

    public function testWithPriceStockShipping()
    {
        $price = [
            "sku" => 45086,
            "valueFrom" => 11.99,
            "valueTo" => 8.99,
        ];

        $stock = [
            "sku" => 45086,
            "qty" => 11861
        ];

        $shipping = [
            "value" => 9.73,
            "baseCost" => 9.73,
            "flow" => "CD",
            "id" => "2",
            "estimateDays" => 2,
            "idSubsidiary" => 3077,
            "origin" => "intelipost",
            "label" => [
                "default" => "Rápida",
                "deadline" => "Rápida - 2 dia(s) útil(eis)",
                "success" => "Rápida - 2 dia(s) útil(eis)",
                "informative" => "Rápida - 2 dia(s) útil(eis)"
            ],
            "oms" => [
                "carrier" => 1,
                "service" => 2
            ],
            "shiftDelivery" => [],
            "information" => "Compre mais R$ 440 e ganhe frete grátis  para a região Sudeste e Centro Oeste.
            Demais regiões o frete é grátis para compras acima de R$ 450.",
            "scheduledDelivery" => false,

        ];

        $this->mockComposition
            ->setPrice($price)
            ->setStock($stock)
            ->setShipping($shipping);

            $this->assertIsArray($this->mockComposition->checkoutProduct());
    }

    public function testGetWithoutPriceStockShipping()
    {
        $this->mockComposition
        ->shouldAllowMockingProtectedMethods()
        ->shouldReceive('getPrice', 'getStock', 'getShipping')
        ->andReturn(collect([]));

        $this->mockComposition
            ->shouldReceive('setPrice', 'setStock', 'setShipping', 'checkoutProduct')
            ->andReturn([]);
        $this->assertIsArray($this->mockComposition->checkoutProduct());
    }

    public function testPriceWithoutStockShippig()
    {
        $this->mockComposition
            ->shouldAllowMockingProtectedMethods()
            ->shouldReceive('getPrice', 'getStock', 'getShipping')
            ->andReturn(collect([]));
        $this->mockComposition
            ->shouldReceive('setStock', 'setShipping', 'getCheckout')
            ->andReturn([]);
        $price = [
            "sku" => 45086,
            "valueFrom" => 11.99,
            "valueTo" => 8.99,
        ];
        $this->mockComposition->setPrice($price);
        $this->assertIsArray($this->mockComposition->checkoutProduct());
    }

    public function testPriceStockWithoutShipping()
    {
        $this->mockComposition
            ->shouldAllowMockingProtectedMethods()
            ->shouldReceive('getPrice', 'getStock', 'getShipping')
            ->andReturn(collect([]));
        $this->mockComposition
            ->shouldReceive('setShipping', 'getCheckout')
            ->andReturn([]);
        $price = [
            "sku" => 45086,
            "valueFrom" => 11.99,
            "valueTo" => 8.99,
        ];
        $stock = [
            "sku" => 45086,
            "qty" => 11861
        ];
        $this->mockComposition->setPrice($price);
        $this->mockComposition->setStock($stock);
        $this->assertIsArray($this->mockComposition->checkoutProduct());
    }
}
