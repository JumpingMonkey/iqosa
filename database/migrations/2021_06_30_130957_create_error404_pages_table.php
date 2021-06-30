<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateError404PagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error404_pages', function (Blueprint $table) {
            $table->id();

            $table->json('title_big_bold');
            $table->json('title_big_thin');
            $table->json('link_text');
            $table->json('link_text_animated');

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
        Schema::dropIfExists('error404_pages');
    }
}
