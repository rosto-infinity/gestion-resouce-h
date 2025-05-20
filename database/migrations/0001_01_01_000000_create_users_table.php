<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 5-Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // -Crée une colonne 'id' auto-incrémentée comme clé primaire
            $table->id();

            // -Crée une colonne 'name' pour stocker le nom de l'utilisateur
            $table->string('name');

            // -Crée une colonne 'usertype' avec une valeur par défaut 'user'
            $table->string('usertype')->default('user');

            // --Crée une colonne 'email' qui doit être unique dans la table
            $table->string('email')->unique();

            // ---Crée une colonne 'email_verified_at' pour stocker la date de vérification de l'email, peut être nulle
            $table->timestamp('email_verified_at')->nullable();

            // --Crée une colonne 'password' pour stocker le mot de passe de l'utilisateur, peut être nulle
            $table->string('password')->nullable();

            // --Crée une colonne pour stocker le token de "remember me"
            $table->rememberToken();

            // ---Crée les colonnes 'created_at' et 'updated_at' pour suivre les timestamps
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * 6-Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
