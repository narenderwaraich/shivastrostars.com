<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_name')->nullable();
            $table->string('section')->nullable();
            $table->string('bg_img')->nullable();
            $table->string('section_sub_heading')->nullable();
            $table->string('section_heading')->nullable(); 
            $table->text('section_content')->nullable();
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
        Schema::dropIfExists('section_images');
    }
}
