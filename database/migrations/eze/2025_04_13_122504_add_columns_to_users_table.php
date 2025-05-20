<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    // Méthode pour appliquer les changements
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // -Ajoute une colonne pour le nom de famille, nullable après 'name'
            $table->string('last_name')->nullable()->after('name');

            // -Ajoute une colonne pour le numéro de téléphone, nullable après 'email'
            $table->string('phone_number')->nullable()->after('email');

            // -Ajoute une colonne pour la date d'embauche, nullable après 'phone_number'
            $table->date('hire_date')->nullable()->after('phone_number');

            // --Ajoute une colonne pour l'ID de l'emploi, nullable, avec contrainte de clé étrangère
            // -Si l'emploi est supprimé, les utilisateurs associés le seront également
            $table->foreignId('emploi_id')
                  ->nullable()->constrained('emplois')
                  ->onDelete('cascade')
                  ->after('hire_date');

            // --Ajoute une colonne pour le salaire, nullable après 'emploi_id'
            $table->decimal('salary', 10, 2)->nullable()->after('emploi_id');

            // --Ajoute une colonne pour le pourcentage de commission, nullable après 'salary'
            $table->decimal('commission_pct', 10, 2)->nullable()->after('salary');
        });
    }

    // ---Méthode pour annuler les changements
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // --Supprime la contrainte de clé étrangère pour 'emploi_id'
            $table->dropForeign(['emploi_id']);

            // --Supprime les colonnes ajoutées
            $table->dropColumn(['last_name', 'phone_number', 'hire_date', 'emploi_id', 'salary', 'commission_pct']);
        });
    }
}
