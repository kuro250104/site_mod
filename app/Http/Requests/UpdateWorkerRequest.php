<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class UpdateWorkerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(Request $request) :array
    {
        return [
            'name' => 'required',
            'surname' => 'required|uppercase:' . $request->post('worker_id'),
            'team_id' => 'required',
            'status_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return[
            'name.required'=> 'Veuillez saisir un nom.',
            'surname.required'=> 'Veuillez saisir un nom de famille.',
            'surname.uppercase'=> 'Le nom de famille doit être en MAJUSCULE.',
        ];
    }
}
