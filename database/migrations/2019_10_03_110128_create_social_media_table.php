<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->bigIncrements('sm_id');
            $table->text('sm_facebook')->nullable();
            $table->text('sm_twitter')->nullable();
            $table->text('sm_linkedin')->nullable();
            $table->text('sm_google')->nullable();
            $table->text('sm_youtube')->nullable();
            $table->text('sm_pinterest')->nullable();
            $table->text('sm_flickr')->nullable();
            $table->text('sm_vimeo')->nullable();
            $table->text('sm_skype')->nullable();
            $table->text('sm_rss')->nullable();
            $table->integer('sm_status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('social_media');
    }
}
