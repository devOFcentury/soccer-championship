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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('mj');
            $table->unsignedInteger('g');
            $table->unsignedInteger('n');
            $table->unsignedInteger('p');
            $table->unsignedInteger('bp');
            $table->unsignedInteger('bc');
            $table->integer('db');
            $table->unsignedInteger('pts');
            $table->foreignId('equipe_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
