<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteFieldsDevelopersFromFooterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->dropColumn('developed_label');
            $table->dropColumn( 'developed_by_label');
            $table->dropColumn( 'developed_by_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->json('developed_label');
            $table->string('developed_by_label')->nullable();
            $table->string('developed_by_link')->nullable();
        });
    }
}
