<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('order_number')->nullable();
            $table->string('order_id')->nullable();
            $table->string('transaction_id' )->nullable();
            $table->string('method' )->nullable();
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total', 10, 2);
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('tax_rate', 10, 2)->nullable();
            $table->text('ship_charge')->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('net_amount', 10, 2)->nullable();
            $table->string('status')->default('Pending');
            $table->integer('user_id')->unsigned();
            $table->index(['user_id'], 'orders_user_id_idx');
            $table->foreign('user_id', 'orders_user_id_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
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
        Schema::dropIfExists('orders');
    }
}
