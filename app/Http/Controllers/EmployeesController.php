<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use App\Models\User;
use App\Models\Emploi;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Services\EmployeeService;
use Maatwebsite\Excel\Facades\Excel;

class EmployeesController extends Controller
{
    /**
     * 0-Constructeur pour initialiser le service d'employé.
     */
    // protected $employeeService;

    // public function __construct(EmployeeService $employeeService)
    // {
    //     $this->employeeService = $employeeService;
    // }


    /**
     * 1-Récupère les données communes pour les vues.
     */
    private function getCommonData(): array
    {
        $emplois = Emploi::all();
        return compact('emplois');
    }
    public function index(Request $request)
    {
        $commonData = $this->getCommonData();
        $employees = User::filter($request)->paginate(4); 
        return view('admin.employees.list', compact('employees', 'commonData'));
    }
    

    /**
     * 3-Affiche le formulaire d'ajout d'un employé.
     */
    public function add()
    {
        // $commonData = $this->employeeService->getCommonData();
        $commonData = $this->getCommonData();
        return view('admin.employees.add', compact('commonData'));
    }

    /**
     * 4-Enregistre un nouvel employé.
     */
    public function store(EmployeeRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('admin.employees')->with('success', 'Employé ajouté avec succès.');
    }

    /**
     * 5--Affiche les détails d'un employé.
     */
    public function view($id)
    {
        $employee = User::findOrFail($id);
        return view('admin.employees.view', compact('employee'));
    }

    /**
     * 6-Affiche le formulaire d'édition d'un employé.
     */
    public function edit($id)
    {
        $employee = User::findOrFail($id);
        $commonData = $this->getCommonData();
        return view('admin.employees.edit', compact('employee', 'commonData'));
    }

    /**
     * 6-Met à jour les informations d'un employé.
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = User::findOrFail($id);
        $employee->update($request->validated());

        return redirect()->route('admin.employees')->with('success', 'Employé mis à jour avec succès.');
    }

    /**
     * 7-Supprime un employé.
     */
    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.employees')->with('success', 'Employé supprimé avec succès.');
    }
    public function excel()
    {
        // --Génère un nom de fichier basé sur la date et l'heure actuelles
        $fileName = now()->format('d-m-Y H.i.s');
        
        //-- Télécharge le fichier Excel avec les données d'historique des emplois
        return Excel::download(new EmployeesExport, 'Employees_' . $fileName . '.xlsx');
    }
}
