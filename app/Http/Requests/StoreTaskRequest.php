<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            "name" => 'required|regex:/^[A-Z]+$/i'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Veuillez saisir un nom pour l'équipe",
        ];

    }
}
