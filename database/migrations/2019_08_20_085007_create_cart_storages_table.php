<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_storages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total', 10, 2);
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('tax_rate', 10, 2)->nullable();
            $table->string('image')->unique()->nullable();
            $table->string('qty')->default(1);
            $table->text('ship_charge')->nullable();
            $table->decimal('discount', 10, 2)->default(0.00);
            $table->string('discount_percentage', 10)->default(0);
            $table->string('coupan_code',150)->nullable();
            $table->decimal('net_amount', 10, 2)->nullable();
            $table->integer('product_id')->unsigned();
            $table->index(['product_id'], 'cart_storages_product_id_idx');
             $table->foreign('product_id', 'cart_storages_product_id_idx')
                ->references('id')->on('products')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->integer('user_id')->unsigned();
            $table->index(['user_id'], 'cart_storages_user_id_idx');
            $table->foreign('user_id', 'cart_storages_user_id_idx')
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
        Schema::dropIfExists('cart_storages');
    }
}
