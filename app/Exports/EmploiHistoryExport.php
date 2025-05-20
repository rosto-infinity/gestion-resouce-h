<?php

namespace App\Exports;

use App\Models\Emploi;
use App\Models\EmploiHistory;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmploiHistoryExport implements FromView
{
    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        // // --Chargement des utilisateurs et des emplois
        // $users = User::all();      
        // $emplois = Emploi::all();

        // // --Chargement des historiques d'emploi avec les relations
        // $emploisHistories = EmploiHistory::with(['user', 'emploi'])->get();


         // 1-. 44Préparation des listes pour les selects
         $users   = User::pluck('name', 'id');               // -charge uniquement id et name :contentReference[oaicite:4]{index=4}
         $emplois = Emploi::pluck('emploi_title', 'id');
 
         // 2-. Application du scope filter et chargement des relations pour éviter le N+1
         $emploisHistories = EmploiHistory::with(['user', 'emploi']);

        return view('admin.emplois_histories.excel', [
            'users' => $users,
            'emplois' => $emplois,
            'emploisHistories' => $emploisHistories,
        ]);
    }
}
