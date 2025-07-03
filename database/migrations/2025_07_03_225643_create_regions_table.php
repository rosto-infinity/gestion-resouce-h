<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Exécute les migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id(); // Colonne 'id' auto-incrémentée
            $table->string('region_name')->nullable(); // Colonne 'region_name' de type chaîne
            $table->timestamps(); // Colonnes 'created_at' et 'updated_at' optionnelles
        });
    }

    /**
     * Annule les migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
