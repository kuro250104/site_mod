<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('workers', function( $table) {
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

};
