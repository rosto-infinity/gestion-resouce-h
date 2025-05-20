<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class EmployeesExport implements FromView
{
    /**
     * C--ette méthode retourne une vue pour l'exportation des employés.
     *
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        // --Récupère tous les utilisateurs (employés) de la base de données
        $employees = User::all();
        
        // --Retourne la vue 'admin.employees.excel' avec les données des employés
        return view('admin.employees.excel', [
            'employees' => $employees // ---Passe les données des employés à la vue
        ]);
    }


}
