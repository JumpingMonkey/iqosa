<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameMapLinkTextAnimatedColForContactsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts_pages', function (Blueprint $table) {
            $table->dropColumn('map_link_text-animated');
            $table->json('map_link_text_animated');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts_pages', function (Blueprint $table) {
            $table->json('map_link_text-animated');
            $table->dropColumn('map_link_text_animated');
        });
    }
}
