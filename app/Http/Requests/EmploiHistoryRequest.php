<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
    $emploiId = $this->input('emploi_id');
    $userId = $this->input('user_id');

    return [
        'user_id' => [
            'required',
            'exists:users,id',
            Rule::unique('emploi_histories')->where(function ($query) use ($emploiId, $userId) {
                return $query->where('emploi_id', $emploiId)
                             ->where('user_id', $userId)
                             ->where('id', '!=', $this->route('id')); // Exclure l'enregistrement en cours
            })
        ],
        'emploi_id' => 'required|exists:emplois,id',
        'start_date' => 'required|date|before_or_equal:today',
        'end_date' => 'nullable|date|after:start_date'
    ];
}

    public function messages(): array
{
    return [
        'user_id.required' => 'Le champ "Utilisateur" est requis.',
        'user_id.exists' => 'L\'utilisateur sélectionné n\'existe pas dans la base de données.',
        'user_id.unique' => 'Cet utilisateur a déjà un historique pour cet emploi.',
        'emploi_id.required' => 'Le champ "Emploi" est requis.',
        'emploi_id.exists' => 'L\'emploi sélectionné n\'existe pas dans la base de données.',
        'start_date.required' => 'La date de début est obligatoire.',
        'start_date.date' => 'La date de début doit être une date valide.',
        'start_date.before_or_equal' => 'La date de début ne peut pas être dans le futur.',
        'end_date.date' => 'La date de fin doit être une date valide.',
        'end_date.after' => 'La date de fin doit être postérieure à la date de début.',
    ];
}

}