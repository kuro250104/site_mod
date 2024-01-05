<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => 'required'
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => "Veuillez saisir un nom pour l'équipe",
        ];
    }
}
