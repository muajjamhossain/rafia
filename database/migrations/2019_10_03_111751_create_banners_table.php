<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('ban_id');
            $table->string('ban_title');
            $table->text('ban_details')->nullable();
            $table->string('ban_button',30)->nullable();
            $table->string('ban_button_url')->nullable();
            $table->string('ban_image',100);
            $table->integer('ban_publish')->default(0);
            $table->string('ban_slug',30);
            $table->integer('ban_status')->default(1);
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
        Schema::dropIfExists('banners');
    }
}
