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
        Schema::create('match_footballs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('score_equipe_domicile');
            $table->unsignedInteger('score_equipe_exterieur');
            $table->foreignId('equipe_domicile')->constrained('equipes')->onDelete('cascade');
            $table->foreignId('equipe_exterieur')->constrained('equipes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_footballs');
    }
};
