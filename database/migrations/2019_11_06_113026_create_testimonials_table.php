<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('tm_id');
            $table->string('tm_name',50);
            $table->string('tm_designation',50)->nullable();
            $table->string('tm_company',100)->nullable();;
            $table->text('tm_review')->nullable();
            $table->string('tm_image',50)->nullable();
            $table->string('tm_slug',40);
            $table->integer('tm_status')->default(1);
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
        Schema::dropIfExists('testimonials');
    }
}
