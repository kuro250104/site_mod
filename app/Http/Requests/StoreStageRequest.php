<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    public function rules(): array
    {
        return [
            "name" => 'required',
            'project_id' =>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => "Veuillez saisir un nom pour le stade",
            'project_id.required' => "Veuillez saisir un nom pour le stade",

        ];

    }
}
