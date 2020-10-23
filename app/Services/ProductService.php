<?php

namespace App\Services;

use Raiadrogasil\Common\Service\BaseService;
use App\Domain\DTO\ProductDTO;

class ProductService extends BaseService implements ProductServiceInterface
{
    /**
     * @var ProductIntegrationService
     */
    private $productIntegrationService;

    public function __construct(ProductIntegrationService $productIntegrationService)
    {
        $this->productIntegrationService = $productIntegrationService;
    }

    /**
     * Buscar todos os registros
     *
     * @param ProductDTO $productDTO
     * @return mixed
     * @throws Exception
     */
    public function getAll(ProductDTO $productDTO)
    {

        return $this->productIntegrationService->getAllCheckout($productDTO);
    }

}
