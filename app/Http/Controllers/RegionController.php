<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    // Afficher la liste des régions
    public function index()
    {
        $regions = Region::paginate(10);
        return view('admin.regions.list-regions', compact('regions'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('regions.create');
    }

    // Enregistrer une nouvelle région
    public function store(Request $request)
    {
        $request->validate([
            'region_name' => 'required|string|max:255|unique:regions',
        ]);

        Region::create($request->all());
        return redirect()->route('regions.index')->with('success', 'Région créée avec succès.');
    }

    // Afficher les détails d'une région
    public function show(string $id)
    {
        $region = Region::findOrFail($id);
        return view('regions.show', compact('region'));
    }

    // Afficher le formulaire de modification
    public function edit(string $id)
    {
        $region = Region::findOrFail($id);
        return view('regions.edit', compact('region'));
    }

    // Mettre à jour une région
    public function update(Request $request, string $id)
    {
        $request->validate([
            'region_name' => 'required|string|max:255|unique:regions,region_name,' . $id,
        ]);

        $region = Region::findOrFail($id);
        $region->update($request->all());
        return redirect()->route('regions.index')->with('success', 'Région mise à jour avec succès.');
    }

    // Supprimer une région
    public function destroy(string $id)
    {
        $region = Region::findOrFail($id);
        $region->delete();
        return redirect()->route('regions.index')->with('success', 'Région supprimée avec succès.');
    }
}