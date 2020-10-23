<?php

namespace App\Http\API\v1\Resources;

use Raiadrogasil\Common\Resource\BaseCollection;
use Raiadrogasil\Common\Resource\BaseResource;

class ProductCollection extends BaseCollection
{
    /**
     * @param $resource
     * @return ProductResource
     * @codeCoverageIgnore
     */
    protected function resource($resource)
    {
        return new ProductResource($resource);
    }


    public function configureMainParser()
    {
        $this->dataParser = [
            BaseResource::MAIN_NODE => $this->collection->map(
                function ($product) {
                    $productResource = $this->resource($product);
                    return $productResource->configureMainParser();
                }
            ),
        ];
        return $this;
    }
}
