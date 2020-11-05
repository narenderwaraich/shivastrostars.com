<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direct_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('payment_method')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('transaction_id')->nullable();
            $table->string('bank_name')->nullable();  
            $table->string('transaction_status')->nullable();
            $table->string('bank_transaction_id')->nullable();
            $table->dateTime('transaction_date')->nullable();
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
        Schema::dropIfExists('direct_payments');
    }
}
