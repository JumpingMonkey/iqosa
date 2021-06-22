<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_pages', function (Blueprint $table) {
            $table->id();
            $table->json('seo_title');
            $table->json('meta_description');
            $table->json('hero_title');
            $table->json('hero_text');
            $table->json('hero_link_text');
            $table->json('hero_link_text_animated');
            $table->string('hero_link')->nullable();
            $table->json('projects');
            $table->json('projects_title');
            $table->json('projects_title_animated');
            $table->string('projects_title_link')->nullable();
            $table->json('projects_current_text_animated');
            $table->json('projects_current_text');
            $table->json('team_members');
            $table->json('team_text');
            $table->json('team_link_text_animated');
            $table->json('team_link_text');
            $table->string('team_link')->nullable();

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
        Schema::dropIfExists('main_pages');
    }
}
