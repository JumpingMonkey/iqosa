<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_pages', function (Blueprint $table) {
            $table->id();
            $table->json('date_label');
            $table->json('team_label');
            $table->json('area_label');
            $table->json('area_unit');
            $table->json('share_title');
            $table->string('share_facebook')->nullable();
            $table->string('share_twitter')->nullable();
            $table->string('share_linkedin')->nullable();
            $table->json('link_block_title');
            $table->json('link_block_text');
            $table->string('link_block_link')->nullable();
            $table->json('next_project_text');
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
        Schema::dropIfExists('project_pages');
    }
}
