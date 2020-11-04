<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAstrologersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('astrologers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone_no')->nullable();
            $table->string('email')->unique();
            $table->tinyInteger('verified')->default(0);
            $table->string('email_token')->nullable();
            $table->date('date')->nullable();
            $table->string('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->string('role', 20)->default('astrologer');
            $table->string('password');
            $table->string('address', 255)->nullable();
            $table->string('country', 45)->nullable();
            $table->string('state', 45)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('zipcode', 100)->nullable();
            $table->integer('auth_id')->unsigned();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->decimal('left_amount', 10, 2)->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('upi_id')->nullable();
            $table->string('chat_refer')->nullable();
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
        Schema::dropIfExists('astrologers');
    }
}
