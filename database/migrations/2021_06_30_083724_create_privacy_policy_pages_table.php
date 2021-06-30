<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivacyPolicyPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privacy_policy_pages', function (Blueprint $table) {
            $table->id();

            $table->json('seo_title');
            $table->json('meta_description');
            $table->json('title_bold');
            $table->json('title_thin');
            $table->json('subtitle');
            $table->json('content');

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
        Schema::dropIfExists('privacy_policy_pages');
    }
}
