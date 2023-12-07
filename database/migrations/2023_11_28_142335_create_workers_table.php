<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string("surname")->nullable();
            $table->string("name")->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
