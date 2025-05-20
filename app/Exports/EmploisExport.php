<?php

namespace App\Exports; // -Déclare le namespace de la classe

use App\Models\Emploi; // -n  Importe le modèle Emploi pour l'utiliser dans cette classe
use Illuminate\Contracts\View\View; // --Importe l'interface View pour le type de retour
use Maatwebsite\Excel\Concerns\FromView; // ---Importe l'interface FromView pour l'exportation Excel

class EmploisExport implements FromView // -Déclare la classe EmploisExport qui implémente l'interface FromView
{
    // --Méthode qui retourne la vue à utiliser pour l'exportation
    public function view(): View
    {
        // --Récupération de tous les emplois depuis la base de données
        return view(
            'admin.emplois.excel', // --Chemin de la vue à utiliser pour l'exportation
            [
                'emplois' => Emploi::all() // --Passe les emplois récupérés à la vue
            ]
        );
    }
}
