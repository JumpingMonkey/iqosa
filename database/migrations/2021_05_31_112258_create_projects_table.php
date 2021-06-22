<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('seo_title');
            $table->json('meta_description');
            $table->string('type')->nullable();
            $table->string('number')->nullable();
            $table->string('link')->unique();
            $table->string('release_date')->nullable();
            $table->string('area')->nullable();
            $table->string('main_picture')->nullable();
            $table->json('city');
            $table->json('country');
            $table->text('content');

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
        Schema::dropIfExists('projects');
    }
}
