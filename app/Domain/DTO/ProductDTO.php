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
class ProductDTO extends BaseDTO implements BaseDTOInterface
{
    private $sku;

    private $zipcode;

    private $storeName;

    private $qty;

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return int
     */
    public function getZipcode(): int
    {
        return $this->zipCode;
    }

    /**
     * @param int $zipCode
     */
    public function setZipcode(int $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getStoreName(): string
    {
        return $this->storeName;
    }

    /**
     * @param string $storeName
     */
    public function setStoreName(string $storeName): void
    {
        $this->storeName = $storeName;
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * @param int $qty
     */
    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'sku' => $this->sku,
            'zipcode' => $this->zipcode,
            'storeName' => $this->storeName,
            'qty' => $this->qty,
        ];
    }
}

