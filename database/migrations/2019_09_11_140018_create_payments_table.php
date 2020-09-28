<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('order_number')->nullable();
            $table->string('payment_method')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('transaction_id')->nullable();
            $table->string('bank_name')->nullable();  
            $table->string('transaction_status')->nullable();
            $table->string('bank_transaction_id')->nullable();
            $table->dateTime('transaction_date')->nullable();
            $table->integer('user_id')->unsigned();
            $table->index(['user_id'], 'payments_user_id_idx');

            $table->foreign('user_id', 'payments_user_id_idx')
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
        Schema::dropIfExists('payments');
    }
}
