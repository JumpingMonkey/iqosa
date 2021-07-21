<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->json('left_title');
            $table->json('left_city');
            $table->json('left_address');
            $table->string('left_google_map_link')->nullable();
            $table->string('left_emails');
            $table->json('left_tels');
            $table->json('center_title');
            $table->json('center_emails');
            $table->json('right_title');
            $table->json('right_big_text');
            $table->json('right_big_link_text');
            $table->string('right_big_link')->nullable();
            $table->json('right_links');
            $table->json('politic_label');
            $table->string('politic_link')->nullable();
            $table->json('social_links');
            $table->json('developed_label');
            $table->string('developed_by_label')->nullable();
            $table->string('developed_by_link')->nullable();
            $table->json('cookie_text');
            $table->json('cookie_btn_text');

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
        Schema::dropIfExists('footers');
    }
}
