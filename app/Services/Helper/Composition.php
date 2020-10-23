<?php

namespace App\Services\Helper;

use App\Http\API\v1\Requests\ProductRequest;
use Illuminate\Support\Collection;
use tests\verification\Tests\ActionGroupGenerationTest;
use App\Domain\DTO\ProductRequestDTO;

class Composition
{
    /**
     * @var Collection
     */

    private $price;

    /**
     * @var Collection
     */
    private $stock;

    /**
     * @var Collection
     */
    private $shipping;

    /**
     * Seta os dados no stock na collection
     *
     * @param array $arrayStock
     *
     * @return $this
     */
    public function setStock(array $arrayStock): self
    {
        $this->stock = collect($arrayStock);

        return $this;
    }

    /**
     * Retorna a collection com os dados do stock
     *
     * @return Collection
     */
    public function getStock(): Collection
    {
        return $this->stock;
    }

    /**
     * Adiciona os dados da price na collection do price
     *
     * @param array $price
     *
     * @return array
     */
    protected function getPrice(): Collection
    {
        return $this->price;
    }

    /**
     * Seta os dados do price na collection
     *
     * @param array $arrayPrice
     *
     * @return $this
     */
    public function setPrice(array $arrayPrice): self
    {
        $this->price = collect($arrayPrice ?? []);

        return $this;
    }

    /**
     * Seta os dados do stock na collection
     *
     * @param array $arrayShipping
     *
     * @return $this
     */
    public function setShipping(array $arrayShipping): self
    {
        $this->shipping = collect($arrayShipping ?? []);

        return $this;
    }

    /**
     * Adiciona os dados da shipping na collection do shipping
     *
     * @param array $shipping
     *
     * @return array
     */
    protected function getShipping(): Collection
    {
        return $this->shipping;
    }

    /**
     * Faz o merge dos dados do price, stock e shipping
     *
     * @return ProductRequestDTO
     */
    public function checkoutProduct()
    {
        $result = new ProductRequestDTO([
            'price' => $this->getPrice(),
            'stock' => $this->getStock(),
            'shipping' => $this->getShipping(),
        ]);

        return $result->toArray();
    }

}
