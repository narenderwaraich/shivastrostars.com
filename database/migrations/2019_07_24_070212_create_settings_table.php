<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('tax_rate', 10, 2)->default(0);
            $table->string('ship_charge')->default(0);
            $table->string('astrologer')->nullable();
            $table->string('admin_mail')->nullable();
            $table->string('astrologer_profit_share')->nullable();
            $table->string('member')->nullable();
            $table->float('talk_per_min')->default(0);
            $table->float('talk_15')->default(0);
            $table->float('talk_30')->default(0);
            $table->string('navbar_background_color')->nullable();
            $table->string('navbar_text_color')->nullable();
            $table->string('navbar_text_hover_color')->nullable();
            $table->string('heading_color')->nullable();
            $table->string('sub_heading_color')->nullable();
            $table->string('link_color')->nullable();
            $table->string('button_color')->nullable();
            $table->string('button_text_color')->nullable();
            $table->string('button_hover_color')->nullable();
            $table->string('button_border_color')->nullable();
            $table->string('button_border_hover_color')->nullable();
            $table->string('button_hover_text_color')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
