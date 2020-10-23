<?php

namespace App\Domain\Entities;

use Raiadrogasil\Common\Entity\BaseEntityMongo;

class Product extends BaseEntityMongo
{
    public $table = 'product';

    /**
     * atributos disponiveis
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
    ];


    /**
     * atributos que sofrerao cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];
}
