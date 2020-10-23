<?php

namespace App\Services;

use App\Domain\DTO\ProductDTO;

interface ProductIntegrationServiceInterface
{
   /**
     * Buscar todos os registros
     *
     * @param ProductDTO $productDTO
     * @return mixed
     */
    public function getAllCheckout(ProductDTO $productDTO);

}
