<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('plan_id')->unsigned()->nullable();
            $table->integer('get_message')->default(0);
            $table->dateTime('access_date')->nullable();
            $table->dateTime('expire_date')->nullable();
            $table->tinyInteger('is_activated')->default(0);
            $table->decimal('amount', 10, 2);
            $table->integer('user_id')->unsigned();
            $table->index(['user_id'], 'user_plans_user_id_idx');
            $table->foreign('user_id', 'user_plans_user_id_idx')
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
        Schema::dropIfExists('user_plans');
    }
}
