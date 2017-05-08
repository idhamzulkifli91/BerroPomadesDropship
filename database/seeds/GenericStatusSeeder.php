<?php

use Illuminate\Database\Seeder;

class GenericStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_status')
            ->insert([
                ['name' => 'Draft','code' => 'draft'],
                ['name' => 'Published','code' => 'published']
            ]);
    }
}
