<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class StoreWorkerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules() :array
    {
        return [
            'name' => 'required',
            'surname' => 'required|uppercase:',
            'status_id' => 'required',
            'team_id' => 'required'
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
