<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateTaskRequest extends FormRequest
{

    public function rules(Request $request): array
    {
        return [
            'name' => 'required' . $request->post('tasks_id')
        ];
    }

    public function messages(): array
    {
        return[
            'name.required'=> 'Veuillez saisir un nom.',
            'name.regex'=> 'Le nom ne doit pas contenir de chiffres.',

        ];
    }
}
