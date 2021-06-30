<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_pages', function (Blueprint $table) {
            $table->id();
            $table->json('seo_title');
            $table->json('meta_description');
            $table->json('title');
            $table->json('subtitle');
            $table->json('numeration_text');
            $table->json('vacancy_link_text');
            $table->json('vacancy_link_text_animated');
            $table->json('bottom_title_bold');
            $table->json('bottom_title_thin');
            $table->string('bottom_link')->nullable();
            $table->json('bottom_link_text');
            $table->json('bottom_link_text_animated');
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
        Schema::dropIfExists('career_pages');
    }
}
