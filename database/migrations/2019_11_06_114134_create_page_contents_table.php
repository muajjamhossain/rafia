<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_contents', function (Blueprint $table) {
            $table->bigIncrements('pc_id');
            $table->integer('page_id');
            $table->string('pc_title',190);
            $table->text('pc_subtitle')->nullable();
            $table->text('pc_details')->nullable();
            $table->string('pc_photo',50)->nullable();
            $table->string('pc_slug',40);
            $table->integer('pc_status')->default(1);
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
        Schema::dropIfExists('page_contents');
    }
}
