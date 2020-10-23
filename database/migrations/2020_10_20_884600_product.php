<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    private $typeConnection = \Raiadrogasil\Common\Entity\BaseEntityInterface::CONN_RELATIONAL;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::connection($this->typeConnection)->hasTable('product')) {
            Schema::connection($this->typeConnection)->create('product', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::connection($this->typeConnection)->hasTable('product')) {
            Schema::connection($this->typeConnection)->dropIfExists('product');
        }
    }
}
