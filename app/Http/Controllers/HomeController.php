<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1-Utilisation de la méthode filter du modèle Employees
        $employees = User::all();
       
        return view('admin.dashboard',compact('employees'));
    }
}