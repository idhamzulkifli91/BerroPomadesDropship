<?php

use Illuminate\Database\Seeder;

class PaymentStatusTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_status')
            ->insert([
                ['name' => 'Unpaid','code' => 'unpaid'],
                ['name' => 'Paid','code' => 'paid'],
                ['name' => 'Overdue','code' => 'overdue'],
            ]);
    }
}
