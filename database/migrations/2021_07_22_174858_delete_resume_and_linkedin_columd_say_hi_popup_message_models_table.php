<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteResumeAndLinkedinColumdSayHiPopupMessageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('say_hi_popup_message_models', function (Blueprint $table) {
            $table->dropColumn('resume');
            $table->dropColumn('linkedin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('say_hi_popup_message_models', function (Blueprint $table) {
            $table->text('resume')->nullable();
            $table->string('linkedin');
        });
    }
}
