<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('gallery_id');
            $table->string('gallery_title',100);
            $table->integer('gcate_id');
            $table->string('gallery_photo',50)->nullable();
            $table->integer('gallery_creator');
            $table->integer('gallery_status')->default(1);
            $table->string('gallery_slug',50);
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
        Schema::dropIfExists('galleries');
    }
}
