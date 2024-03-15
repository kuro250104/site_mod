<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateValidatedHourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'worker_id' =>'required',
            'team_id' =>'nullable',
            'hour_id'=>'required',
            'date'=>'required',
            'number_one' => 'nullable|digits:8',
            'task_one' => 'nullable|exists:tasks,id',
            'subtask_one' => 'nullable',
            'stage_one' => 'nullable|exists:stages,id',
            'project_one' => 'nullable|exists:projects,id',
            'timer_one'=>'nullable',
            'coment_one'=>'nullable',

            'number_two'=>'nullable|digits:8',
            'task_two' => 'nullable|exists:tasks,id',
            'subtask_two' => 'nullable',
            'stage_two' => 'nullable|exists:stages,id',
            'project_two' => 'nullable|exists:projects,id',
            'timer_two'=>'nullable',
            'coment_two'=>'nullable',

            'number_three'=>'nullable|digits:8',
            'task_three' => 'nullable|exists:tasks,id',
            'subtask_three' => 'nullable',
            'stage_three' => 'nullable|exists:stages,id',
            'project_three' => 'nullable|exists:projects,id',
            'timer_three'=>'nullable',
            'coment_three'=>'nullable',


            'number_four'=>'nullable|digits:8',
            'task_four' => 'nullable|exists:tasks,id',
            'subtask_four' => 'nullable',
            'stage_four' => 'nullable|exists:stages,id',
            'project_four' => 'nullable|exists:projects,id',
            'timer_four'=>'nullable',
            'coment_four'=>'nullable',
        ];
    }


    public function messages(): array
    {
        return [
            'worker_id.required' => "Veuillez remplir le nom de l'opérateur ",
            'hour_id.required' => "Veuillez entrer un nombre d'heures totale",
            'date.required'=>"Veuillez sélectionner la date",
            'number_one.digits' => "Vérifier que le numéro d'OP 1 continent bien 8 chiffres",
            'number_two.digits' => "Vérifier que le numéro d'OP 2 continent bien 8 chiffres",
            'number_three.digits' => "Vérifier que le numéro d'OP 3 continent bien 8 chiffres",
            'number_four.digits' => "Vérifier que le numéro d'OP 4 continent bien 8 chiffres",


        ];
    }
}
