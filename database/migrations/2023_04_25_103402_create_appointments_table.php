<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name',70);
            $table->integer('age');
            $table->enum('gender', ['Male', 'Female', 'Gay']);
            $table->enum('patient_status', ['New', 'Old']);

            $table->date('schedule_date')->nullable();
            $table->time('schedule_time')->nullable();
            $table->text('description')->nullable();

            $table->unsignedBigInteger('speciality_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();

            $table->string('slug',70);
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('speciality_id')->references('speciality_id')->on('specialities')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            // $table->foreign('doctor_id')->references('id')->on(config('database.connections.mysql.database') . '.doctors')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
