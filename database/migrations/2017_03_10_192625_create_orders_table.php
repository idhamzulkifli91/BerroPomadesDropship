<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('order_status')->default(1);
            $table->integer('payment_status')->default(1);
            $table->date('paid_at')->nullable();
            $table->string('payment_evidence')->nullable();
            $table->string('payment_method')->nullable();
            $table->decimal('total', 10, 2);
            $table->string('customer_name')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_contact')->nullable();
            $table->string('customer_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
