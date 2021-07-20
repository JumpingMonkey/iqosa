<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add3And4ColsAnimTextToAboutUsPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us_pages', function (Blueprint $table) {
            $table->json('second_animated_text');
            $table->json('fourth_animated_text');
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
            $table->dropColumn('second_animated_text');
            $table->dropColumn('fourth_animated_text');
        });
    }
}
