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
        Schema::table('match_footballs', function (Blueprint $table) {
            $table->foreignId('journee_id')->constrained()->after('equipe_exterieur');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('match_footballs', function (Blueprint $table) {
            //
        });
    }
};
