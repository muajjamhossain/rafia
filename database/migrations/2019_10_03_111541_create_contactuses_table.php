<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactuses', function (Blueprint $table) {
            $table->bigIncrements('conus_id');
            $table->string('conus_name',70);
            $table->string('conus_email',50)->nullable();
            $table->string('conus_phone',20)->nullable();
            $table->text('conus_sub')->nullable();
            $table->text('conus_mess')->nullable();
            $table->string('conus_slug',30);
            $table->integer('conus_status')->default(1);
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
        Schema::dropIfExists('contactuses');
    }
}
