<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_pages', function (Blueprint $table) {
            $table->id();
            $table->json('seo_title');
            $table->json('meta_description');
            $table->string('main_picture')->nullable();
            $table->string('preview_video')->nullable();
            $table->json('main_video');
            $table->json('hero_left_text');
            $table->json('hero_right_text');
            $table->json('first_animated_text');
            $table->json('team_members');
            $table->json('team_text');
            $table->json('team_link_text_animated');
            $table->json('team_link_text');
            $table->string('team_link')->nullable();
            $table->json('second_animated_text');
            $table->json('slider_text');
            $table->string('slider_pictures')->nullable();
            $table->string('bottom_block_picture')->nullable();
            $table->json('bottom_block_text');
            $table->json('bottom_block_hover_text');
            $table->string('bottom_block_link')->nullable();
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
        Schema::dropIfExists('about_us_pages');
    }
}
