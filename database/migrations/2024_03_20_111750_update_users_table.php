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
        Schema::table('users', function( $table) {
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('role_id')->references('model_id')->on('model_has_permissions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
