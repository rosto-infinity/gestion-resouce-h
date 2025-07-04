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
        Schema::create('countries', function (Blueprint $table) {
             $table->id(); // Colonne 'id' auto-incrémentée
            $table->string('country_name')->nullable(); // Colonne 'country_name' de type chaîne, nullable
           $table->foreignId('region_id')
            ->constrained()
            ->onDelete('cascade');

            $table->timestamps(); // Colonnes 'created_at' et 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
