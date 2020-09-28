<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->string('status')->default('Pending');
            $table->text('reply')->nullable();
            $table->decimal('rating', 2,1)->default(0);
            $table->integer('product_id')->unsigned();
            $table->index(['product_id'], 'reviews_product_id_idx');
            $table->foreign('product_id', 'reviews_product_id_idx')
                ->references('id')->on('products')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->integer('user_id')->unsigned();
            $table->index(['user_id'], 'reviews_user_id_idx');
            $table->foreign('user_id', 'reviews_user_id_idx')
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
        Schema::dropIfExists('reviews');
    }
}
