<?php

namespace App\Repositories;

use App\Domain\Entities\Product;
use Raiadrogasil\Common\Repository\BaseRepository;

/**
 * Class ProductRepository
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }
}
