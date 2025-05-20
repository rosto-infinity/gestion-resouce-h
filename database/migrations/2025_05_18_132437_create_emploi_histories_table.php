<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *2- Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emploi_histories', function (Blueprint $table) {
            $table->id();

            // 2-Relation avec les utilisateurs
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade');

            // 3-Relation avec un emploi
            $table->foreignId('emploi_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade');

            // 5-Dates de début et de fin (de type date ou datetime, pas integer)
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * 6-Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploi_histories');
    }
};
