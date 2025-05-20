<?php

namespace App\Http\Controllers;

use App\Exports\EmploisExport;
use App\Models\Emploi;
use Illuminate\Http\Request;
use App\Http\Requests\EmploiRequest;
use Maatwebsite\Excel\Facades\Excel;

class EmploisController extends Controller
{
    public function index(Request $request)
    {
         // 4-Utilisation de la méthode filter du modèle emplois
         $emploisQuery = Emploi::filter($request);
    
         // 5-Pagination
         $emplois = $emploisQuery->paginate(4);
         
     
        return view('admin.emplois.list', compact('emplois'));
    }

    public function add(Request $request)
    {
        return view('admin.emplois.add');
    }
    /**
     * Summary of store
     * @param \App\Http\Requests\EmploiRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmploiRequest $request)
    {
        // 01. Validate the request
        Emploi::create($request->validated());
    
        // 03. Redirect or return a response
        return redirect()->route('admin.emplois')->with('success', 'emploi added successfully.');
    }
    public function view($id)
    {
        // 2. 0Fetch the emploi data by ID
        $emploi = Emploi::findOrFail($id); // Find or fail
      
    
        return view('admin.emplois.view', compact('emploi'));
    }

    public function edit($id)
{
    // 3-0Récupérer l'emplois par ID
    $emploi = Emploi::findOrFail($id);

    // 4-0Retourner la vue avec les données de l'emplois 
    return view('admin.emplois.edit', compact('emploi'));
}

public function update(EmploiRequest $request, $id)
{
    $emploi = Emploi::findOrFail($id); // --Trouver l'emplois  ou échouer
    // 5 - --Mettre à jour l'emplois  avec les données validées
    $emploi->update($request->validated());
 
    return redirect()->route('admin.emplois')->with('success', 'Employé mis à jour avec succès.');
}

    public function destroy($id)
{
    // 6 - --Supprimer l'emplois  par ID
    $emploi = Emploi::findOrFail($id); // ---Trouver l'emplois  ou échouer
    $emploi->delete(); // ---Supprimer l'emplois 

    // 7 - -Rediriger ou retourner une réponse
    return redirect()->route('admin.emplois')->with('success', 'emploi deleted successfully.');
}
    public function excel()
{
    $fileName = now()->format('d-m-Y H.i.s');
    return Excel::download(new EmploisExport, 'Emplois_' .$fileName  .'.xlsx');
}

}

    

