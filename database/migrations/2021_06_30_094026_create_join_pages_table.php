<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_pages', function (Blueprint $table) {
            $table->id();

            $table->json('seo_title');
            $table->json('meta_description');
            $table->json('title_small');
            $table->json('title_big_bold');
            $table->json('title_big_thin');
            $table->json('prev_page_label');
            $table->string('prev_page_link')->nullable();
            $table->json('next_page_label');
            $table->string('next_page_link')->nullable();
            $table->json('text_before_name');
            $table->json('name_input_placeholder');
            $table->json('text_before_vacancy');
            $table->json('vacancy_input_placeholder');
            $table->json('text_before_file');
            $table->json('file_input_placeholder');
            $table->json('text_before_portfolio');
            $table->json('portfolio_input_placeholder');
            $table->json('text_before_email');
            $table->json('email_input_placeholder');
            $table->json('submit_text');
            $table->json('submit_text_animated');
            $table->json('thanks_title_bold');
            $table->json('thanks_title_thin');
            $table->json('thanks_link_text');
            $table->json('thanks_link_text_animated');

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
        Schema::dropIfExists('join_pages');
    }
}
