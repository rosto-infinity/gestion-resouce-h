<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploiHistoryRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id|unique:users,name', // Vérifie que l'utilisateur existe
            'emploi_id' => 'required|exists:emplois,id', // Vérifie que l'emploi existe
            'start_date' => 'required|date|before:end_date', // Doit être une date avant end_date
            'end_date' => 'required|date|after:start_date', // Doit être une date après start_date
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Le champ utilisateur est requis.',
            'user_id.exists' => 'L\'utilisateur sélectionné n\'existe pas.',
            'emploi_id.required' => 'Le champ emploi est requis.',
            'emploi_id.exists' => 'L\'emploi sélectionné n\'existe pas.',
            'start_date.required' => 'La date de début est requise.',
            'start_date.date' => 'La date de début doit être une date valide.',
            'start_date.before' => 'La date de début doit être avant la date de fin.',
            'end_date.required' => 'La date de fin est requise.',
            'end_date.date' => 'La date de fin doit être une date valide.',
            'end_date.after' => 'La date de fin doit être après la date de début.',
        ];
    }
}
