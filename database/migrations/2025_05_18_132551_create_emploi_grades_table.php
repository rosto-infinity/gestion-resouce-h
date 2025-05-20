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
        Schema::create('emploi_grades', function (Blueprint $table) {
            $table->id(); // -Colonne id auto-incrémentée
            $table->string('grade_level'); // -Colonne pour le niveau de grade
            $table->decimal('lowest_salary', 10, 2); // -Colonne pour le salaire le plus bas
            $table->decimal('highest_salary', 10, 2); // -Colonne pour le salaire le plus élevé
            $table->timestamps(); // -Colonne pour les timestamps created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploi_grades');
    }
};
