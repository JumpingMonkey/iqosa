<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSecondAnimTextColToAboutUsPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us_pages', function (Blueprint $table) {
            $table->renameColumn('second_animated_text', 'third_animated_text');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us_pages', function (Blueprint $table) {
            $table->renameColumn('third_animated_text', 'second_animated_text');
        });
    }
}
