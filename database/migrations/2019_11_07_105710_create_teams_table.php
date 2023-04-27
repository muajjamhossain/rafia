<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('team_id');
            $table->string('team_name',50);
            $table->string('team_designation',50)->nullable();
            $table->text('team_details')->nullable();
            $table->string('team_photo',50)->nullable();
            $table->string('team_facebook',190)->nullable();
            $table->string('team_twitter',190)->nullable();
            $table->string('team_linkedin',190)->nullable();
            $table->string('team_pinterest',190)->nullable();
            $table->string('team_google',190)->nullable();
            $table->string('team_youtube',190)->nullable();
            $table->string('team_slug',40)->nullable();
            $table->integer('team_publish')->default(0);
            $table->integer('team_status')->default(1);
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
        Schema::dropIfExists('teams');
    }
}
