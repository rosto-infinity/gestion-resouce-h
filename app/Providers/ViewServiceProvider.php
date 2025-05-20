<?php

namespace App\Providers;

use App\Models\Emploi;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    //     View::composer(['admin.employees.*'], function ($view) {
    //         $view->with('emplois', Emploi::all());
    //     });
    }
}
// <?php
// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::table('users', function (Blueprint $table) {
//             $table->string('last_name')->nullable()->after('name');
//             $table->string('phone_number')->nullable()->after('email');
//             $table->date('hire_date')->nullable()->after('phone_number');
//             $table->foreignId('emploi_id')
//             ->nullable()->constrained('emplois')
//                   ->onDelete('cascade')
//                   ->after('hire_date');
//             $table->decimal('salary', 10, 2)->nullable()->after('emploi_id');
//             $table->decimal('commission_pct', 10, 2)->nullable()->after('salary');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::table('users', function (Blueprint $table) {
//             $table->dropForeign(['emploi_id']);
//             $table->dropColumn(['last_name', 'phone_number', 'hire_date', 'emploi_id', 'salary','commission_pct']);
//         });
//     }
// };