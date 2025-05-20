<?php

use App\Http\Controllers\EmploiHistoryController;
use App\Http\Controllers\EmploisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\JobsController;
use App\Models\EmploiHistory;

// -Route principale qui redirige vers la méthode 'home' du ProductController
Route::get('/', [ProductController::class, 'home'])->name('home');

// --Route pour le tableau de bord, accessible uniquement aux utilisateurs authentifiés et vérifiés
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --Routes protégées par authentification
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); //-- Éditer le profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); //-- Mettre à jour le profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // --Supprimer le profil
});

/**
 * 1 - --Routes Administrateur
 */
Route::middleware(['auth', 'admin'])->group(function () {
  
    // 2 - -Routes pour les Employés
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard'); // 03 - Tableau de bord administrateur
    Route::get('admin/employees', [EmployeesController::class, 'index'])->name('admin.employees'); // 04 - Lister tous les employés
    Route::get('admin/employees/excel', [EmployeesController::class, 'excel'])->name('admin.employees.excel'); // 05 - --Exporter les employés au format Excel
    Route::get('admin/employees/add', [EmployeesController::class, 'add'])->name('admin.employees.add'); // 06 - -Ajouter un nouvel employé  
    Route::post('admin/employees/add', [EmployeesController::class, 'store'])->name('admin.employees.store'); // 07 - -Enregistrer un nouvel employé
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view'])->name('admin.employees.view'); // 08 -- Voir les détails d'un employé
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit'])->name('admin.employees.edit'); // 09 - -Éditer un employé
    Route::patch('admin/employees/update/{id}', [EmployeesController::class, 'update'])->name('admin.employees.update'); // 10 -- Mettre à jour un employé
    Route::delete('admin/employees/delete/{id}', [EmployeesController::class, 'destroy'])->name('admin.employees.destroy'); // 11 - -Supprimer un employé
  
    // --Routes pour les Emplois
    Route::get('admin/emplois', [EmploisController::class, 'index'])->name('admin.emplois'); // 12 - -Lister tous les emplois
    Route::get('admin/emplois/excel', [EmploisController::class, 'excel'])->name('admin.emplois.excel'); // 20 - -Exporter les emplois au format Excel
    Route::get('admin/emplois/filter', [EmploisController::class, 'filter'])->name('admin.emplois.filter'); // 13 - -Filtrer les emplois
    Route::get('admin/emplois/add', [EmploisController::class, 'add'])->name('admin.emplois.add'); // 14 -- Ajouter un nouvel emploi
    Route::post('admin/emplois/add', [EmploisController::class, 'store'])->name('admin.emplois.store'); // 15 -- Enregistrer un nouvel emploi
    Route::get('admin/emplois/view/{id}', [EmploisController::class, 'view'])->name('admin.emplois.view'); // 16 - -Voir les détails d'un emploi
    Route::get('admin/emplois/edit/{id}', [EmploisController::class, 'edit'])->name('admin.emplois.edit'); // 17 - --Éditer un emploi
    Route::patch('admin/emplois/update/{id}', [EmploisController::class, 'update'])->name('admin.emplois.update'); // 18 - --Mettre à jour un emploi
    Route::delete('admin/emplois/delete/{id}', [EmploisController::class, 'destroy'])->name('admin.emplois.destroy'); // 19 --- Supprimer un emploi
});

// --Routes pour l'historique des emplois
Route::get('admin/emplois_histories', [EmploiHistoryController::class, 'index'])->name('admin.emplois_histories'); // 21 - Lister tous les historiques d'emploi
Route::get('admin/emplois_histories/excel', [EmploiHistoryController::class, 'excel'])->name('admin.emplois_histories.excel'); // 22 - ---Exporter les historiques d'emploi au format Excel
Route::get('admin/emplois_histories/create', [EmploiHistoryController::class, 'create'])->name('admin.emplois_histories.create'); // 23 - Formulaire de création d'historique d'emploi
Route::post('admin/emplois_histories', [EmploiHistoryController::class, 'store'])->name('admin.emplois_histories.store'); // 24 - Enregistrer un nouvel historique d'emploi
Route::get('admin/emplois_histories/{id}', [EmploiHistoryController::class, 'show'])->name('admin.emplois_histories.show'); // 25 - Voir les détails d'un historique d'emploi
Route::get('admin/emplois_histories/{id}/edit', [EmploiHistoryController::class, 'edit'])->name('admin.emplois_histories.edit'); // 26 - Éditer un historique d'emploi
Route::patch('admin/emplois_histories/{id}', [EmploiHistoryController::class, 'update'])->name('admin.emplois_histories.update'); // 27 - Mettre à jour un historique d'emploi
Route::delete('admin/emplois_histories/{id}', [EmploiHistoryController::class, 'destroy'])->name('admin.emplois_histories.destroy'); // 28 - Supprimer un historique d'emploi

require __DIR__.'/auth.php'; // Inclusion des routes d'authentification

// Routes commentées qui peuvent être utilisées ultérieurement
// Route::get('admin/dashboard', [HomeController::class, 'index']);
// Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
