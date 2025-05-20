<?php

namespace App\Http\Controllers;

use App\Exports\EmploiHistoryExport;
use App\Http\Requests\EmploiHistoryRequest;
use App\Models\EmploiHistory;
use App\Models\User;
use App\Models\Emploi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;

class EmploiHistoryController extends Controller
{
    /**
     * Summary of index
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View
    {
        // 1-. 44Préparation des listes pour les selects
        $users   = User::pluck('name', 'id');               // -charge uniquement id et name :contentReference[oaicite:4]{index=4}
        $emplois = Emploi::pluck('emploi_title', 'id');

        // 2-. Application du scope filter et chargement des relations pour éviter le N+1
        $query = EmploiHistory::with(['user', 'emploi'])
                              ->filter($request);       // -scope local défini sur le modèle :contentReference[oaicite:5]{index=5}

        // 3-. Pagination optimisée et conservation des query string
        $emploisHistories = $query->paginate(4)
                                  ->withQueryString();    // -conserve ?user_id=…&emploi_id=… :contentReference[oaicite:6]{index=6}

        return view(
            'admin.emplois_histories.list',
            compact('emploisHistories', 'users', 'emplois')
        );
    }

    /**
     * -Affiche le formulaire de création.
     */
    public function create(): View
    {
        $users   = User::pluck('name', 'id');
        $emplois = Emploi::pluck('emploi_title', 'id');

        return view(
            'admin.emplois_histories.add',
            compact('users', 'emplois')
        );
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\EmploiHistoryRequest $request
     * @return RedirectResponse
     */
    public function store(EmploiHistoryRequest $request): RedirectResponse
    {
        EmploiHistory::create(
            $request->validated()                      // -validated() renvoie seulement les champs valides :contentReference[oaicite:7]{index=7}
        );

        return redirect()
            ->route('admin.emplois_histories')
            ->with('success', 'Historique ajouté avec succès.'); // flash en session :contentReference[oaicite:8]{index=8}
    }

    /**
     * --Affiche un historique précis.
     */
    public function show(int $id)
    {
        $emploiHistory = EmploiHistory::with(['user','emploi'])
                                ->findOrFail($id);

        return view(
            'admin.emplois_histories.view',
            compact('emploiHistory')
        );
    }

    /**
     * --Affiche le formulaire d’édition pré-rempli.
     */
    public function edit(int $id): View
    {
        $users   = User::pluck('name', 'id');
        $emplois = Emploi::pluck('emploi_title', 'id');
        $emploiHistory= EmploiHistory::findOrFail($id);

        return view(
            'admin.emplois_histories.edit',
            compact('emploiHistory', 'users', 'emplois')
        );
    }


    /**
     * Summary of update
     * @param \App\Http\Requests\EmploiHistoryRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update( EmploiHistoryRequest $request,int $id ): RedirectResponse 
    {
        $emploiHistory= EmploiHistory::findOrFail($id);

        $emploiHistory->update($request->validated());

        return redirect()
            ->route('admin.emplois_histories')
            ->with('success', 'Historique mis à jour avec succès.');
    }

    /**
     * --Supprime un historique.
     */
    public function destroy(int $id): RedirectResponse
    {
        $history = EmploiHistory::findOrFail($id);
        $history->delete();

        return redirect()
            ->route('admin.emplois_histories')
            ->with('success', 'Historique supprimé avec succès.'); // --flash message :contentReference[oaicite:10]{index=10}
    }

    public function excel()
{
    // ---Génère un nom de fichier basé sur la date et l'heure actuelles
    $fileName = now()->format('d-m-Y H.i.s');
    
    //-- Télécharge le fichier Excel avec les données d'historique des emplois
    return Excel::download(new EmploiHistoryExport, 'EmploisHistories_' . $fileName . '.xlsx');
}

}
