<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "name" => 'required|unique:projects|uppercase'
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => "Veuillez saisir un nom pour le projet",
            'name.unique' => "Ce projet existe déjà",
            'name.uppercase' => "Veuillez écrire en majuscules",
        ];
    }


}
