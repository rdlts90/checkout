<?php

use \Raiadrogasil\Configuration\Domain\Entities\Configuration;
use \Raiadrogasil\Common\Enum\EnumStore;
use \Raiadrogasil\Configuration\Util\Enum\EnumTypeConfiguration;
use \Eighty8\LaravelSeeder\Migration\MigratableSeeder;
use \Eighty8\LaravelSeeder\Repository\DisableForeignKeysTrait;
use \Illuminate\Support\Facades\DB;
use \App\Util\Enum\EnumConfiguration;

class Price extends MigratableSeeder
{
    use DisableForeignKeysTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $typeConnection = Configuration::typeConnectionToConfiguration();

        DB::connection($typeConnection)->table(Configuration::TABLE)->insert([
            'name_group' => EnumConfiguration::MS_GROUP,
            'name_identify' => EnumConfiguration::RD_URI_PRICE_PRODUCT,
            'name' => 'URI da API do MS de Price',
            'value' => '',
            'name_store' => EnumStore::ALL_STORES,
            'type_configuration' => EnumTypeConfiguration::STRING,
            'channel_site' => 1,
            'channel_tlv' => 1,
            'channel_app' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }


    public function down(): void
    {
        $typeConnection = Configuration::typeConnectionToConfiguration();

        DB::connection($typeConnection)->table(Configuration::TABLE)
            ->where('name_group', EnumConfiguration::MS_GROUP)
            ->where('name_identify', EnumConfiguration::RD_URI_PRICE_PRODUCT)
            ->delete();

    }
}
