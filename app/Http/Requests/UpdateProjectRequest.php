<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(Request $request): array
    {
        return [
            "name" => 'required|unique:projects' . $request->post('projects_id')
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => "Veuillez saisir un nom pour le projet",
            'name.unique' => "Ce projet existe déjà",
        ];
    }
}
