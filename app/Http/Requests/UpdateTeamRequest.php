<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class UpdateTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(Request $request) :array
    {
        return [
            'name' => 'required' .  $request->post('team_id')
        ];
    }

    public function messages(): array
    {
        return[
            'name.required'=> 'Veuillez saisir un nom.',


        ];
    }
}
