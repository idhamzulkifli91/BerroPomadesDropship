<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(\Backpack\Settings\database\seeds\SettingsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(GenericStatusSeeder::class);
        $this->call(RoleTablesSeeder::class);
        $this->call(PaymentStatusTable::class);
        $this->call(OrderStatusSeeder::class);
    }
}
