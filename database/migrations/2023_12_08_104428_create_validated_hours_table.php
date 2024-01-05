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
        Schema::create('validated_hours', function (Blueprint $table) {
            $table->id();
            $table->datetimes();
            $table->unsignedBigInteger('worker_id');
            $table->string('timer');

            $table->string('number_one')->nullable();
            $table->unsignedBigInteger('task_one')->nullable();
            $table->unsignedBigInteger('stage_one')->nullable();
            $table->unsignedBigInteger('project_one')->nullable();
            $table->string('timer_one')->nullable();

            $table->string('number_two')->nullable();
            $table->unsignedBigInteger('task_two')->nullable();
            $table->unsignedBigInteger('stage_two')->nullable();
            $table->unsignedBigInteger('project_two')->nullable();
            $table->string('timer_two')->nullable();

            $table->string('number_three')->nullable();
            $table->unsignedBigInteger('task_three')->nullable();
            $table->unsignedBigInteger('stage_three')->nullable();
            $table->unsignedBigInteger('project_three')->nullable();
            $table->string('timer_three')->nullable();


//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validated_hours');
    }
};
