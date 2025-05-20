<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploiRequest extends FormRequest
{
    /**
     * 6-Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * 7-Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //Emplois
            'emploi_title' => 'required|string|max:100|unique:emplois,emploi_title,' . $this->route('id'),
            'min_salary' => 'required|numeric|min:0|max:250000',
            'max_salary' => 'required|numeric|min:0|max:500000|gte:min_salary', // 3-Vérifie que max_salary >= min_salary
        ];
    }

    /**
     * 2Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'emploi_title.required' => 'Le titre du poste est obligatoire.',
            'emploi_title.unique' => 'Le titre du poste  est déjà utilisée.',
            'min_salary.required' => 'Le salaire minimum est obligatoire.',
            'max_salary.required' => 'Le salaire maximum est obligatoire.',
            'max_salary.gte' => 'Le salaire maximum doit être supérieur ou égal au salaire minimum.',
        ];
    }
}

