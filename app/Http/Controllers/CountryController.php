<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Affiche la liste des pays
     */
    public function index()
    {
        $countries = Country::with('region')->latest()->paginate(10);
        return view('admin.countries.list-countries', compact('countries'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        $regions = Region::all();
        return view('admin.countries.add-countries', compact('regions'));
    }

    /**
     * Enregistre un nouveau pays
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'country_name' => 'required|string|max:255',
            'region_id' => 'nullable|exists:regions,id'
        ]);

        Country::create($validated);

        return redirect()->route('countries.index')
            ->with('success', 'Pays créé avec succès');
    }

    /**
     * Affiche les détails d'un pays
     */
    public function show(Country $country)
    {
        return view('admin.countries.view-countries', compact('country'));
    }

    /**
     * Affiche le formulaire d'édition
     */
    public function edit(Country $country)
    {
        $regions = Region::all();
        return view('admin.countries.edit-countries', compact('country', 'regions'));
    }

    /**
     * Met à jour un pays
     */
    public function update(Request $request, Country $country)
    {
        $validated = $request->validate([
            'country_name' => 'required|string|max:255',
            'region_id' => 'nullable|exists:regions,id'
        ]);

        $country->update($validated);

        return redirect()->route('countries.index')
            ->with('success', 'Pays mis à jour avec succès');
    }

    /**
     * Supprime un pays
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')
            ->with('success', 'Pays supprimé avec succès');
    }
}
