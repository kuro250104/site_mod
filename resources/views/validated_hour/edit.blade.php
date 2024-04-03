@extends('pages.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Modifications des heures de {{$valid_hours->user->name}} , à la date du {{$valid_hours->date}}</h1>
        </div>
        <!-- Page Heading -->
        <div class="collapse-show" id="collapseCardExample">
            <div class="card-body">

                <form action="{{route('validated_hour.update', $valid_hours->id)}}" method="POST" onsubmit="return fieldCondition()">
                    @csrf
                    <div class="input-group">
                        <input name="user_id"  type="hidden" value="{{$valid_hours->user->id}}">
                        <select type="text" name="hour_id" id="hour_id" class="form-control bg-light border small" oninput="verifierSomme()" value="{{old('time')}}"
                                aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->hour->id}}">{{$valid_hours->hour->name}}</option>
                            @foreach($hours as $hour)
                                <option value="{{$hour->id}}"> {{$hour->name}}</option>
                            @endforeach
                        </select>
                        <input type="date" class="form-control bg-light border small" id="start" name="date" value="{{$valid_hours->date}}"  min="2000-01-01" max="2050-12-31" />
                    </div>

                    <p>Tâche 1</p>
                    <div class="input-group">
                        <input type="number" step="0.5" oninput="verifierSomme()" name="timer_one" id="timer_one" class="form-control bg-light border small" value="{{$valid_hours->timer_one}}"
                               placeholder="Temps de la tâche" aria-label="Search" aria-describedby="basic-addon2">
                        <select name="task_one" id="task_one" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->taskOne->id}}"> {{$valid_hours->taskOne->name}}</option>
                            @foreach($tasks as $task)
                                <option value="{{ $task->id }}"> {{ $task->name }}</option>
                            @endforeach
                        </select >
                        <select name="subtask_one" id="subtask_one" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->subtaskOne->id}}"> {{$valid_hours->subtaskOne->name}}</option>
                            @foreach($subtasks as $subtask)
                                <option value="{{$subtask->id}}">{{$subtask->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="number_one" class="form-control bg-light border small" value="{{$valid_hours->number_one}}"
                               placeholder="Numéro de l'OP" aria-label="Search" aria-describedby="basic-addon2">
                        <select type="text" name="project_one" id="project_one" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->projectOne->id}}">{{$valid_hours->projectOne->name}}</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}"> {{ $project->name }}</option>
                            @endforeach
                        </select>
                        <select type="text" name="stage_one" id="stage_one" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option  value="{{$valid_hours->stageOne->id}}">{{$valid_hours->stageOne->name}}</option>
                            @foreach($stages as $stage)
                                <option value="{{ $stage->id }}"> {{ $stage->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="coment_one" class="form-control bg-light border small" value="{{$valid_hours->coment_one}}"
                               placeholder="Commentaire" aria-label="Search" aria-describedby="basic-addon2">
                    </div>

                    <p>Tâche 2</p>
                    <div class="input-group">
                        <input type="number" step="0.5" oninput="verifierSomme()" name="timer_two" id="timer_two" class="form-control bg-light border small" value="{{$valid_hours->timer_two}}"
                               placeholder="Temps de la tâche" aria-label="Search" aria-describedby="basic-addon2">

                        <select type="text" name="task_two" id="task_two" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->taskTwo->id}}">{{$valid_hours->taskTwo->name}}</option>
                            @foreach($tasks as $task)
                                <option value="{{ $task->id }}"> {{ $task->name }}</option>
                            @endforeach
                        </select>
                        <select name="subtask_two" id="subtask_two" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->subtaskTwo->id}}">{{$valid_hours->subtaskTwo->name}}</option>
                            @foreach($subtasks as $subtask)
                                <option value="{{$subtask->id}}">{{$subtask->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="number_two" class="form-control bg-light border small" value="{{$valid_hours->number_two}}"
                               placeholder="Numéro de l'OP" aria-label="Search" aria-describedby="basic-addon2">

                        <select type="text" name="project_two" id="project_two" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->projectTwo->id}}">{{$valid_hours->projectTwo->name}}</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}"> {{ $project->name }}</option>
                            @endforeach
                        </select>
                        <select type="text" name="stage_two" id="stage_two" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->stageTwo->id}}">{{$valid_hours->stageTwo->name}}</option>
                            @foreach($stages as $stage)
                                <option value="{{ $stage->id }}"> {{ $stage->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="coment_two" class="form-control bg-light border small" value="{{$valid_hours->coment_two}}"
                               placeholder="Commentaire" aria-label="Search" aria-describedby="basic-addon2">
                    </div>

                    <p>Tâche 3</p>
                    <div class="input-group">
                        <input type="number" step="0.5" oninput="verifierSomme()" name="timer_three" id="timer_three" class="form-control bg-light border small" value="{{$valid_hours->timer_three}}"
                               placeholder="Temps de la tâche" aria-label="Search" aria-describedby="basic-addon2">
                        <select type="text" id="task_three" name="task_three" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->taskThree->id}}">{{$valid_hours->taskThree->name}}</option>
                            @foreach($tasks as $task)
                                <option value="{{ $task->id }}"> {{ $task->name }}</option>
                            @endforeach
                        </select>
                        <select name="subtask_three" id="subtask_three" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->subtaskThree->id}}">{{$valid_hours->subtaskThree->name}}</option>
                            @foreach($subtasks as $subtask)
                                <option value="{{$subtask->id}}">{{$subtask->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="number_three" class="form-control bg-light border small" value="{{$valid_hours->number_three}}"
                               placeholder="Numéro de l'OP" aria-label="Search" aria-describedby="basic-addon2">
                        <select type="text" name="project_three" id="project_three" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->projectThree->id}}">{{$valid_hours->projectThree->name}}</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}"> {{ $project->name }}</option>
                            @endforeach
                        </select>
                        <select type="text" name="stage_three" id="stage_three" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option   value="{{$valid_hours->stageThree->id}}">{{$valid_hours->stageThree->name}}</option>
                            @foreach($stages as $stage)
                                <option value="{{ $stage->id }}"> {{ $stage->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="coment_three" class="form-control bg-light border small" value="{{$valid_hours->coment_three}}"
                               placeholder="Commentaire" aria-label="Search" aria-describedby="basic-addon2">
                    </div>

                    <p>Tâche 4</p>
                    <div class="input-group">
                        <input type="number" step="0.5" oninput="verifierSomme()" name="timer_four" id="timer_four" class="form-control bg-light border small" value="{{$valid_hours->timer_four}}"
                               placeholder="Temps de la tâche" aria-label="Search" aria-describedby="basic-addon2">
                        <select type="text" name="task_four" id="task_four" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->taskFour->id}}">{{$valid_hours->taskFour->name}}</option>
                            @foreach($tasks as $task)
                                <option value="{{ $task->id }}"> {{ $task->name }}</option>
                            @endforeach
                        </select>
                        <select name="subtask_four" id="subtask_four" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option {{$valid_hours->subtaskFour->id}}> {{$valid_hours->subtaskFour->name}} </option>
                            @foreach($subtasks as $subtask)
                                <option value="{{$subtask->id}}">{{$subtask->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="number_four" class="form-control bg-light border small" value="{{$valid_hours->number_four}}"
                               placeholder="Numéro de l'OP" aria-label="Search" aria-describedby="basic-addon2">
                        <select type="text" name="project_four" id="project_four" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="{{$valid_hours->projectFour->id}}"> {{$valid_hours->projectFour->name}}</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}"> {{ $project->name }}</option>
                            @endforeach
                        </select>
                        <select type="text" name="stage_four" id="stage_four" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option {{$valid_hours->stageFour->id}}> {{$valid_hours->stageFour->name}}</option>
                            @foreach($stages as $stage)
                                <option value="{{ $stage->id }}"> {{ $stage->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="coment_four" class="form-control bg-light border small" value="{{$valid_hours->coment_four}}"
                               placeholder="Commentaire" aria-label="Search" aria-describedby="basic-addon2">
                    </div>

                    <div class="input-group-append">
                        <div>

                            <button id="submitBtn" type="submit"  class="btn btn-success btn-icon-split"  spellcheck="false"><span class="icon text-white-50"><i class="fas fa-check"></i></span>
                                <span class="text">Valider</span>
                            </button>
                        </div>
                    </div>

                </form>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @can('user_manage')
                <form class="pt-3" action="{{route('validated_hour.destroy', $valid_hours->id)}}" method="POST">
                    @method("delete")
                    @csrf
                    <button id="submitBtn" type="submit"  class="btn btn-danger btn-icon-split"  spellcheck="false"><span class="icon text-white-50"><i class="fas fa-trash"></i></span>
                        <span class="text">Supprimer</span>
                    </button>
                </form>
                @endcan
            </div>

        </div>


        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ \Session::get('error') }}</li>
                </ul>
            </div>
        @endif
    </div>
    @include('pages.selects_stage')

@endsection
