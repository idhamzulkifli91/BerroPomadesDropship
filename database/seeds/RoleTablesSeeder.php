<?php

use Illuminate\Database\Seeder;

class RoleTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')
            ->insert([

                ['name' => 'Administrator', 'code' => 'admin'],
                ['name' => 'Leader', 'code' => 'leader'],
                ['name' => 'Stockist', 'code' => 'stockist'],
                ['name' => 'Agent', 'code' => 'agent'],
                ['name' => 'Dropship', 'code' => 'dropship']
            ]);
    }
}
