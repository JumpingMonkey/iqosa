<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkWithYouPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_with_you_pages', function (Blueprint $table) {
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
            $table->json('form_title');
            $table->json('firstname_input_placeholder');
            $table->json('lastname_input_placeholder');
            $table->json('portfolio_input_placeholder');
            $table->json('email_input_placeholder');
            $table->json('message_input_placeholder');
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
        Schema::dropIfExists('work_with_you_pages');
    }
}
