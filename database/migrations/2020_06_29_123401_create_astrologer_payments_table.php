<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAstrologerPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('astrologer_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id')->nullable();
            $table->string('transaction_id' )->nullable();
            $table->string('bank_transaction_id' )->nullable();
            $table->string('payment_method' )->nullable();
            $table->string('bank_name' )->nullable();
            $table->string('transaction_status')->default('Pending');
            $table->dateTime('transaction_date')->nullable();
            $table->decimal('amount', 10, 2);
            $table->integer('user_id')->unsigned();
            $table->index(['user_id'], 'astrologer_payments_user_id_idx');

            $table->foreign('user_id', 'astrologer_payments_user_id_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->integer('astrologer_id')->unsigned();
            $table->index(['astrologer_id'], 'astrologer_payments_astrologer_id_idx');

            $table->foreign('astrologer_id', 'astrologer_payments_astrologer_id_idx')
                ->references('id')->on('astrologers')
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
        Schema::dropIfExists('astrologer_payments');
    }
}
