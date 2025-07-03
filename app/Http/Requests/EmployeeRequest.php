<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:users,email,' . $this->route('id'), // 0019-Exclure l'ID actuel de la vérification unique
            'phone_number' => 'required|string|max:20', // 20-Validation pour le numéro de téléphone
            'hire_date' => 'required|date',
            'emploi_id' => 'required|exists:emplois,id', // 21-Vérifie que emploi_id existe dans la table emplois
            'salary' => 'required|numeric|min:0|max:500000', // 21-Assurez-vous que le salaire est positif
            'commission_pct' => 'required|numeric|min:0|max:100000', // 22-Pourcentage de commission entre 0 et 100
            // 'manager_id' => 'required',
            // 'departement_id' => 'required',
            // 'job_id'         => 'required|exists:jobs,id', // 23-Vérifie que job_id existe dans la table jobs
            // 'manager_id'     => 'required|exists:users,id', // 24-Vérifie que manager_id existe dans la table users
            // 'department_id'  => 'required|exists:departments,id', // 26-Vérifie que department_id existe dans la table departments
        ];
    }

    /**
     * 1-Messages personnalisés pour les erreurs de validation.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom de l\'employé est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'phone_number.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'phone_number.max' => 'Le numéro de téléphone ne peut pas dépasser 15 caractères.',
            'emploi_id.required' => 'Le poste de l\'employé est obligatoire.',
            'emploi_id.string' => 'Le poste doit être une chaîne de caractères.',
            'emploi_id.max' => 'Le poste ne peut pas dépasser 100 caractères.',
            'salary.required' => 'Le salaire est obligatoire.',
            'salary.numeric' => 'Le salaire doit être un nombre.',
            'salary.min' => 'Le salaire doit être supérieur ou égal à 0.',
            'salary.max' => 'Le salaire ne peut pas dépasser 500000.',
        ];
    }
}
