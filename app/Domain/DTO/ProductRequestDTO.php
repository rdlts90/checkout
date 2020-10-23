<?php

namespace App\Domain\DTO;

use Raiadrogasil\Common\DTO\BaseDTO;
use Raiadrogasil\Common\DTO\BaseDTOInterface;

/**
 * @SuppressWarnings(PHPMD)
 *
 * Class ProductDTO
 * @package App\Domain\DTO
 */
class ProductRequestDTO extends BaseDTO implements BaseDTOInterface
{
    private $price;
    private $stock;
    private $shipping;

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $id $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

      /**
     * @return mixed
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param mixed $id $shipping
     */
    public function setShipping($shipping): void
    {
        $this->shipping = $shipping;
    }

      /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $id $stock
     */
    public function setstock($stock): void
    {
        $this->stock = $stock;
    }

    public function toArray()
    {
        return [
            'price' => $this->price,
            'stock' => $this->stock,
            'shipping' => $this->shipping,
        ];
    }
}
