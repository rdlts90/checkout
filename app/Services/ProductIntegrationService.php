<?php

namespace App\Services;

use App\Services\Connect\Microservice\Price;
use App\Services\Connect\Microservice\Stock;
use App\Services\Connect\Microservice\Shipping;

use App\Services\Helper\Composition;
use Raiadrogasil\Common\Service\BaseService;
use App\Domain\DTO\ProductDTO;

class ProductIntegrationService extends BaseService implements ProductIntegrationServiceInterface
{
    /**
     * @var Price
     */
    private $priceConn;

      /**
     * @var Stock
     */
    private $stockConn;

      /**
     * @var Shipping
     */
    private $shippingConn;

    /**
     * @var Composition
     */
    private $composition;


    /**
     * LiveProductIntegrationService constructor.
     *
     * @param Price $priceConn
     * @param Stock $stockConn
     * @param Shipping $shippingConn
     * @param Composition $composition
     */
    public function __construct(
        Composition $composition,
        Price $priceConn,
        Stock $stockConn,
        Shipping $shippingConn
    ) {
        $this->composition = $composition;
        $this->priceConn = $priceConn;
        $this->stockConn = $stockConn;
        $this->shippingConn = $shippingConn;
    }

    /**
     * Buscar todos os registros por levando em consideracao o cliente
     *
     * @param ProductDTO $productDTO
     *
     * @return array|null
     * @throws \Exception
     */
    public function getAllCheckout(ProductDTO $productDTO)
    {

        $price = $this->priceConn->getProductPrice($productDTO) ?? [];
        $stock = $this->stockConn->getProductStock($productDTO) ?? [];
        $shipping = $this->shippingConn->getProductShipping($productDTO) ?? [];


        $this->composition->setPrice($price)
            ->setStock($stock)
            ->setShipping($shipping);

        return $this->composition->checkoutProduct();
    }
}
