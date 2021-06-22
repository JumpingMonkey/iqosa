<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_pages', function (Blueprint $table) {
            $table->id();
            $table->json('seo_title');
            $table->json('meta_description');
            $table->json('projects_title');
            $table->json('projects_subtitle');
            $table->json('projects_block_text');
            $table->json('projects_list_text');
            $table->json('date_label');
            $table->json('area_label');
            $table->json('area_unit');
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
        Schema::dropIfExists('projects_pages');
    }
}
