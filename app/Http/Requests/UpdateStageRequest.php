<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateStageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(Request $request) :array
    {
        return [
            'name' => 'required' .  $request->post('team_id'),
            'project_id'=>'required'
        ];
    }
    public function messages(): array
    {
        return[
            'name.required'=> 'Veuillez saisir un nom.',
            'project_id.required'=> 'Veuillez saisir un projet.',


        ];
    }
}
