<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRashifalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rashifals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('mesh');
            $table->text('vrishabh');
            $table->text('mithun');
            $table->text('kark');
            $table->text('simha');
            $table->text('kanya');
            $table->text('tula');
            $table->text('vrishchik');
            $table->text('dhanu');
            $table->text('makar');
            $table->text('kumbh');
            $table->text('meen');
            $table->dateTime('today_date')->nullable();
            $table->string('write_by')->nullable();
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
        Schema::dropIfExists('rashifals');
    }
}
