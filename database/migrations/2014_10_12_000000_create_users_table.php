<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('phone_no')->nullable();
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->tinyInteger('verified')->default(0);
                $table->tinyInteger('suspend')->default(0);
                $table->string('email_token')->nullable();
                $table->string('otp', 50)->nullable();
                $table->string('google_id', 255)->nullable();
                $table->date('date')->nullable();
                $table->string('gender')->nullable();
                $table->string('avatar')->nullable();
                $table->string('role', 20)->default('user');
                $table->string('password');
                $table->string('remember_token')->nullable();
                
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
