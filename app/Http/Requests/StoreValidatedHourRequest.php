<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreValidatedHourRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'worker_id' =>'required',
            'team_id' =>'nullable',
            'timer'=>'nullable',

            'number_one'=>'nullable',
            'task_one' => 'nullable|exists:tasks,id',
            'stage_one' => 'nullable|exists:stages,id',
            'project_one' => 'nullable|exists:projects,id',
            'timer_one'=>'nullable',

            'number_two'=>'nullable',
            'task_two' => 'nullable|exists:tasks,id',
            'stage_two' => 'nullable|exists:stages,id',
            'project_two' => 'nullable|exists:projects,id',
            'timer_two'=>'nullable',

            'number_three'=>'nullable',
            'task_three' => 'nullable|exists:tasks,id',
            'stage_three' => 'nullable|exists:stages,id',
            'project_three' => 'nullable|exists:projects,id',
            'timer_three'=>'nullable',

        ];
    }

    public function messages(): array
    {
        return[
            'worker_id.required'=> "Veuillez remplir le nom de l'opérateur ",
//            'timer.required'=>"Veuillez entrer un nombre d'heure total"

        ];
    }
}
