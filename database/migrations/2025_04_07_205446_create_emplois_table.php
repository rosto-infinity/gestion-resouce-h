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
        Schema::create('emplois', function (Blueprint $table) {
            $table->id(); // 00-Colonne id, auto-incrémentée
            $table->string('emploi_title')->nullable(); // 001-Colonne job_title, par défaut null
            $table->string('min_salary')->nullable(); // 03-Colonne min_salary, par défaut null
            $table->string('max_salary')->nullable(); // 04-Colonne max_salary, par défaut null
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplois');
    }
};
