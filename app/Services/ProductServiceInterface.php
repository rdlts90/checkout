<?php

namespace App\Services;

use Illuminate\Http\Request;
use Raiadrogasil\Common\DTO\ReturnDTO;
use App\Domain\DTO\ProductDTO;

interface ProductServiceInterface
{
     /**
     * Buscar todos os registros
     *
     * @param ProductDTO $productDTO
     * @return mixed
     */
    public function getAll(ProductDTO $productDTO);

}
