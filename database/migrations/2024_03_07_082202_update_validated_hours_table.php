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
        Schema::table('validated_hours', function(Blueprint $table) {
            $table->foreign('hour_id')->references('id')->on('hours');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('task_one')->references('id')->on('tasks');
            $table->foreign('subtask_one')->references('id')->on('subtask');
            $table->foreign('stage_one')->references('id')->on('stages');
            $table->foreign('project_one')->references('id')->on('projects');
            $table->foreign('task_two')->references('id')->on('tasks');
            $table->foreign('subtask_two')->references('id')->on('subtask');
            $table->foreign('stage_two')->references('id')->on('stages');
            $table->foreign('project_two')->references('id')->on('projects');
            $table->foreign('task_three')->references('id')->on('tasks');
            $table->foreign('subtask_three')->references('id')->on('subtask');
            $table->foreign('stage_three')->references('id')->on('stages');
            $table->foreign('project_three')->references('id')->on('projects');
            $table->foreign('task_four')->references('id')->on('tasks');
            $table->foreign('subtask_four')->references('id')->on('subtask');
            $table->foreign('stage_four')->references('id')->on('stages');
            $table->foreign('project_four')->references('id')->on('projects');
        });
    }

    public function down(): void
    {
        Schema::table('validated_hours', function (Blueprint $table) {

            $table->dropForeign(['hour_id']);
            $table->dropForeign(['worker_id']);
            $table->dropForeign(['task_one']);
            $table->dropForeign(['subtask_one']);
            $table->dropForeign(['stage_one']);
            $table->dropForeign(['project_one']);
            $table->dropForeign(['task_two']);
            $table->dropForeign(['stage_two']);
            $table->dropForeign(['project_two']);
            $table->dropForeign(['task_three']);
            $table->dropForeign(['stage_three']);
            $table->dropForeign(['project_three']);
            $table->dropForeign(['task_four']);
            $table->dropForeign(['stage_four']);
            $table->dropForeign(['project_four']);
        });
    }
};
