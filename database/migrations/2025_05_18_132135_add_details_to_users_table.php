<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ajoute les colonnes à la table users.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ajout du nom de famille après 'name'
            $table->string('last_name')
                  ->nullable()
                  ->after('name');                                     

            // Ajout du numéro de téléphone après 'email'
            $table->string('phone_number')
                  ->nullable()
                  ->after('email');                                    

            // Ajout de la date d'embauche après 'phone_number'
            $table->date('hire_date')
                  ->nullable()
                  ->after('phone_number');                             

            // Clé étrangère emploi_id vers la table 'emplois', cascade on delete
            $table->foreignId('emploi_id')
                  ->nullable()
                  ->constrained('emplois')
                  ->onDelete('cascade')
                  ->after('hire_date');                                

            // Ajout du salaire après 'emploi_id'
            $table->decimal('salary', 10, 2)
                  ->nullable()
                  ->after('emploi_id');                                

            // Ajout du pourcentage de commission après 'salary'
            $table->decimal('commission_pct', 10, 2)
                  ->nullable()
                  ->after('salary');                                   
        });
    }

    /**
     * Supprime les colonnes et la contrainte en cas de rollback.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Retrait de la clé étrangère avant de supprimer la colonne
            $table->dropForeign(['emploi_id']);                       

            // Suppression de toutes les colonnes ajoutées
            $table->dropColumn([
                'commission_pct',
                'salary',
                'emploi_id',
                'hire_date',
                'phone_number',
                'last_name',
            ]);                                                     
        });
    }
};
