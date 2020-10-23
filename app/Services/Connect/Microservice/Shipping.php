<?php

namespace App\Services\Connect\Microservice;

use App\Domain\DTO\ProductDTO;
use Raiadrogasil\Connect\DTO\RequestDTO;
use Raiadrogasil\Connect\Enum\EnumVerbRequest;
use Raiadrogasil\Connect\ClientConnect;
use App\Util\Enum\EnumConfiguration;
use Raiadrogasil\Connect\DTO\ResponseDefaultDTO;

class Shipping
{
     /**
     * @var ClientConnect
     */
    private $clientConnect;

    public function __construct(ClientConnect $clientConnect)
    {
        $this->clientConnect = $clientConnect;
    }

    /**
     * Buscar cotação do frete para o produto
     *
     * @param ProductDTO $productDTO
     * @return array|false
     * @throws \Exception
     */
    public function getProductShipping(ProductDTO $productDTO)
    {
        $storeName = $productDTO->getStoreName();
        $sku = $productDTO->getSku();
        $zipcode = $productDTO->getZipcode();
        $qty = $productDTO->getQty();

        if (!$zipcode || !$qty) {
            return [];
        }

        $requestDTO = $this->buildRequest($storeName, $sku, $zipcode, $qty);

        $responseDTO = $this->sendRequest($requestDTO);
        if ($responseDTO->isError()) {
            return false;
        }

        return $responseDTO->getResults()['results'];
    }

    /**
     * @param string $storeName
     * @param int $sku
     * @param int $zipcode
     * @param int $qty
     *
     * @return \Raiadrogasil\Connect\DTO\RequestDTO
     */
    public function buildRequest(string $storeName, int $sku, int $zipcode, int $qty): RequestDTO
    {
        $configUriApi = configuration(EnumConfiguration::MS_GROUP, EnumConfiguration::RD_URI_API_SHIPPING_QUOTE);

        $configUriApi = \sprintf($configUriApi, $storeName);

        return (new RequestDTO(EnumVerbRequest::POST, $configUriApi))
            ->setQueryString('traceId', getTraceId())
            ->setQueryString('sku', $sku)
            ->setQueryString('zipcode', $zipcode)
            ->setQueryString('qty', $qty)
            ->setTimeOut(2);
    }

    /**
     * @param RequestDTO $requestDTO
     *
     * @return ResponseDefaultDTO
     */
    public function sendRequest($requestDTO): ResponseDefaultDTO
    {
        $configApiLog = configuration(EnumConfiguration::MS_GROUP, EnumConfiguration::ACTIVATE_LOG_API_SHIPPING);

        return $this->clientConnect
            ->setSaveLog(boolval($configApiLog))
            ->setMock('shipping.json', true)
            ->setThrowException(false)
            ->send($requestDTO);
    }
}
