<?php

namespace App\Http\Controllers;

use App\Models\EmploiGrade;
use Illuminate\Http\Request;

class EmploiGradeController extends Controller
{
    public function index(Request $request)
    {
        $query = EmploiGrade::query();
        
        // Filtres
        if ($request->filled('grade_level')) {
            $query->where('grade_level', 'like', '%'.$request->grade_level.'%');
        }
        
        if ($request->filled('min_salary')) {
            $query->where('lowest_salary', '>=', $request->min_salary);
        }
        
        if ($request->filled('max_salary')) {
            $query->where('highest_salary', '<=', $request->max_salary);
        }
        
        $emploisGrades = $query->paginate(10);
        
        return view('admin.emplois_notes.list-emplois-notes', compact('emploisGrades'));
    }

    public function create()
    {
        return view('admin.emplois_notes.add-emplois-notes');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'grade_level' => 'required|string|max:255',
            'lowest_salary' => 'required|numeric|min:0',
            'highest_salary' => 'required|numeric|gt:lowest_salary',
        ]);

        EmploiGrade::create($validated);

        return redirect()->route('emploi_grade.index')
            ->with('success', 'Grade créé avec succès');
    }

    public function show($id)
    {
        $grade = EmploiGrade::findOrFail($id);
        return view('admin.emplois_notes.view-emplois-notes', compact('grade'));
    }

    public function edit($id)
    {
        $grade = EmploiGrade::findOrFail($id);
        return view('admin.emplois_notes.edit-emplois-notes', compact('grade'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'grade_level' => 'required|string|max:255',
            'lowest_salary' => 'required|numeric|min:0',
            'highest_salary' => 'required|numeric|gt:lowest_salary',
        ]);

        $grade = EmploiGrade::findOrFail($id);
        $grade->update($validated);

        return redirect()->route('emploi_grade.index')
            ->with('success', 'Grade mis à jour avec succès');
    }

    public function destroy($id)
    {
        $grade = EmploiGrade::findOrFail($id);
        $grade->delete();

        return redirect()->route('emploi_grade.index')
            ->with('success', 'Grade supprimé avec succès');
    }
}
