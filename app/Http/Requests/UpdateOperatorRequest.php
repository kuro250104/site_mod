<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateOperatorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(Request $request) :array
    {
        return [
            'name' => 'required',
            'team_id' => 'required',
            'status_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return[
            'name.required'=> 'Veuillez saisir un nom.',

        ];
    }
}
