<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('cross_price', 10, 2)->nullable();
            $table->decimal('original_price', 10, 2);
            $table->string('image')->unique()->nullable();
            $table->string('image1')->unique()->nullable();
            $table->string('image2')->unique()->nullable();
            $table->string('image3')->unique()->nullable();
            $table->string('image4')->unique()->nullable();
            $table->string('qty')->default(1);
            $table->integer('reviews_count')->default(0);
            $table->decimal('rating', 2,1)->default(0);
            $table->string('status')->default(0);
            $table->string('stock')->default('In Stock');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('product_types_id')->unsigned()->nullable();
            $table->index(['category_id'], 'products_category_id_idx');
            $table->index(['product_types_id'], 'products_product_types_id_idx');
             $table->foreign('category_id', 'products_category_id_idx')
                ->references('id')->on('categories')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('product_types_id', 'products_product_types_id_idx')
                ->references('id')->on('product_types')
                ->onDelete('no action')
                ->onUpdate('no action');

                $table->timestamps();
                $table->softDeletes();
                $table->index(['deleted_at']);
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
        Schema::dropIfExists('products');
    }
}
