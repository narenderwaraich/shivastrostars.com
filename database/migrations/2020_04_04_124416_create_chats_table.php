<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_message')->nullable();
            $table->text('reply_message')->nullable();
            $table->string('file')->nullable();
            $table->string('message_status')->default('Pending');
            $table->string('message_assign')->nullable();
            $table->integer('user_id')->unsigned();
            $table->index(['user_id'], 'chats_user_id_idx');
            $table->foreign('user_id', 'chats_user_id_idx')
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
        Schema::dropIfExists('chats');
    }
}
