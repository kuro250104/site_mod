@extends('pages.app')
<style>
    .hidden {
        display: none;
    }

    .pagination {
        cursor: pointer;
        padding: 5px;
        margin: 2px;
        background-color: #f0f0f0;
        border: 1px solid #ddd;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des heures validées</h1>
        </div>
        @can('operator')
            <div class="card shadow mb-4">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                   aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Formulaire de validation des heures</h6>
                </a>
                <div class="collapse-show" id="collapseCardExample">
                    <div class="card-body">
                        <form id="hourForm" action="{{route('validated_hour.store')}}" method="POST"
                              onsubmit="fieldCondition()">
                            @csrf
                            <div class="input-group">
                                <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                                {{--                            <select type="text" name="user_id" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">--}}
                                {{--                                <option value="">Sélectionnez un opérateur</option>--}}
                                {{--                                @foreach($users as $user)--}}
                                {{--                                    <option value="{{ $user->id }}">{{ $user->name }}</option>--}}
                                {{--                                @endforeach--}}
                                {{--                            </select>--}}
                                <select type="text" name="hour_id" id="hour_id"
                                        class="form-control bg-light border small" oninput="verifyTimer()"
                                        value="{{old('time')}}"
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <option value="">Sélectionnez un poste</option>
                                    @foreach($hours as $hour)
                                        <option value="{{$hour->id}}"> {{$hour->name}}</option>
                                    @endforeach
                                </select>
                                <input type="date" class="form-control bg-light border small" id="start" name="date"
                                       min="2000-01-01" max="2050-12-31"/>
                            </div>
                            <p>Tâche 1</p>
                            <div class="input-group">
                                <input type="number" step="0.5" oninput="verifyTimer()" name="timer_one" id="timer_one"
                                       class="form-control bg-light border small" value="{{old('timer_one')}}"
                                       placeholder="Temps de la tâche" aria-label="Search"
                                       aria-describedby="basic-addon2">
                                <select name="task_one" id="task_one" class="form-control bg-light border small"
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <option value="">Choisissez une tâche</option>
                                    @foreach($tasks as $task)
                                        <option value="{{ $task->id }}"> {{ $task->name }}</option>
                                    @endforeach
                                </select>
                                <select name="subtask_one" id="subtask_one" class="form-control bg-light border small"
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <option value="">Choisissez une sous-tâche</option>
                                    @foreach($subtasks as $subtask)
                                        <option value="{{$subtask->id}}">{{$subtask->name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" id="number_one" name="number_one" class="form-control bg-light border small"
                                       value="{{old('number_one')}}"
                                       placeholder="Numéro de l'OP" aria-label="Search" aria-describedby="basic-addon2">
                                <select type="text" name="project_one" id="project_one"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez un projet</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}"> {{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <select type="text" name="stage_one" id="stage_one"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez un stade</option>
                                    @foreach($stages as $stage)
                                        <option value="{{ $stage->id }}"> {{ $stage->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="coment_one" class="form-control bg-light border small"
                                       value="{{old('coment_one')}}"
                                       placeholder="Commentaire" aria-label="Search" aria-describedby="basic-addon2">
                            </div>
                            <p>Tâche 2</p>
                            <div class="input-group">
                                <input type="number" step="0.5" oninput="verifyTimer()" name="timer_two" id="timer_two"
                                       class="form-control bg-light border small" value="{{old('timer_two')}}"
                                       placeholder="Temps de la tâche" aria-label="Search"
                                       aria-describedby="basic-addon2">

                                <select type="text" name="task_two" id="task_two"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez une tâche</option>
                                    @foreach($tasks as $task)
                                        <option value="{{ $task->id }}"> {{ $task->name }}</option>
                                    @endforeach
                                </select>
                                <select name="subtask_two" id="subtask_two" class="form-control bg-light border small"
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <option value="">Choisissez une sous-tâche</option>
                                    @foreach($subtasks as $subtask)
                                        <option value="{{$subtask->id}}">{{$subtask->name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="number_two" class="form-control bg-light border small"
                                       value="{{old('number_two')}}"
                                       placeholder="Numéro de l'OP" aria-label="Search" aria-describedby="basic-addon2">

                                <select type="text" name="project_two" id="project_two"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez un projet</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}"> {{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <select type="text" name="stage_two" id="stage_two"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez un stade</option>
                                    @foreach($stages as $stage)
                                        <option value="{{ $stage->id }}"> {{ $stage->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="coment_two" class="form-control bg-light border small"
                                       value="{{old('coment_two')}}"
                                       placeholder="Commentaire" aria-label="Search" aria-describedby="basic-addon2">
                            </div>
                            <p>Tâche 3</p>
                            <div class="input-group">
                                <input type="number" step="0.5" oninput="verifyTimer()" name="timer_three"
                                       id="timer_three" class="form-control bg-light border small"
                                       value="{{old('timer_three')}}"
                                       placeholder="Temps de la tâche" aria-label="Search"
                                       aria-describedby="basic-addon2">
                                <select type="text" id="task_three" name="task_three"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez une tâche</option>
                                    @foreach($tasks as $task)
                                        <option value="{{ $task->id }}"> {{ $task->name }}</option>
                                    @endforeach
                                </select>
                                <select name="subtask_three" id="subtask_three"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez une sous-tâche</option>
                                    @foreach($subtasks as $subtask)
                                        <option value="{{$subtask->id}}">{{$subtask->name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="number_three" class="form-control bg-light border small"
                                       value="{{old('number_three')}}"
                                       placeholder="Numéro de l'OP" aria-label="Search" aria-describedby="basic-addon2">
                                <select type="text" name="project_three" id="project_three"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez un projet</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}"> {{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <select type="text" name="stage_three" id="stage_three"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez un stade</option>
                                    @foreach($stages as $stage)
                                        <option value="{{ $stage->id }}"> {{ $stage->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="coment_three" class="form-control bg-light border small"
                                       value="{{old('coment_three')}}"
                                       placeholder="Commentaire" aria-label="Search" aria-describedby="basic-addon2">
                            </div>

                            <p>Tâche 4</p>
                            <div class="input-group">
                                <input type="number" step="0.5" oninput="verifyTimer()" name="timer_four"
                                       id="timer_four" class="form-control bg-light border small"
                                       value="{{old('timer_four')}}"
                                       placeholder="Temps de la tâche" aria-label="Search"
                                       aria-describedby="basic-addon2">
                                <select type="text" name="task_four" id="task_four"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez une tâche</option>
                                    @foreach($tasks as $task)
                                        <option value="{{ $task->id }}"> {{ $task->name }}</option>
                                    @endforeach
                                </select>
                                <select name="subtask_four" id="subtask_four" class="form-control bg-light border small"
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <option value="">Choisissez une sous-tâche</option>
                                    @foreach($subtasks as $subtask)
                                        <option value="{{$subtask->id}}">{{$subtask->name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="number_four" class="form-control bg-light border small"
                                       value="{{old('number_four')}}"
                                       placeholder="Numéro de l'OP" aria-label="Search" aria-describedby="basic-addon2">
                                <select type="text" name="project_four" id="project_four"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez un projet</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}"> {{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <select type="text" name="stage_four" id="stage_four"
                                        class="form-control bg-light border small" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <option value="">Choisissez un stade</option>
                                    @foreach($stages as $stage)
                                        <option value="{{ $stage->id }}"> {{ $stage->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="coment_four" class="form-control bg-light border small"
                                       value="{{old('coment_four')}}"
                                       placeholder="Commentaire" aria-label="Search" aria-describedby="basic-addon2">
                            </div>
                            <H4 class="font-bold" id="sumDisplay"></H4>
                            <div class="input-group-append">
                                <button id="submitBtn" type="submit" class="btn btn-success btn-icon-split"
                                        spellcheck="false"><span class="icon text-white-50"><i class="fas fa-check"></i></span>
                                    <span class="text">Valider</span>
                                </button>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        @endcan
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tableau des heures</h6>
            </div>
            <div class="card-body">
                <a onclick="exportMsg()"
                   href="{{ route('exportToExcel') }}"
                   class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">Exporter sur Excel</span>
                </a>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                {{--                                <input type="text" id="searchInput"  placeholder="Rechercher...">--}}

                                <table id="" class="table table-bordered" aria-describedby="" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Actions</th>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Poste</th>
                                        <th>Nom / Prénom</th>
                                        <th>Équipe</th>
                                        <th>Temps de tâche 1</th>
                                        <th>Tâche 1</th>
                                        <th>Sous tâche 1</th>
                                        <th>Numéro d'OP 1</th>
                                        <th>Projet 1</th>
                                        <th>Stade 1</th>
                                        <th>Commentaire 1</th>
                                        <th>Temps de tâche 2</th>
                                        <th>Tâche 2</th>
                                        <th>Sous tâche 2</th>
                                        <th>Numéro d'OP 2</th>
                                        <th>Projet 2</th>
                                        <th>Stade 2</th>
                                        <th>Commentaire 2</th>
                                        <th>Temps de tâche 3</th>
                                        <th>Tâche 3</th>
                                        <th>Sous tâche 3</th>
                                        <th>Numéro d'OP 3</th>
                                        <th>Projet 3</th>
                                        <th>Stade 3</th>
                                        <th>Commentaire 3</th>
                                        <th>Temps de tâche 4</th>
                                        <th>Tâche 4</th>
                                        <th>Sous tâche 4</th>
                                        <th>Numéro d'OP 4</th>
                                        <th>Projet 4</th>
                                        <th>Stade 4</th>
                                        <th>Commentaire 4</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($valid_hours as $valid_hour)
                                        <tr>
                                            <td><a href="{{ route('validated_hour.edit', $valid_hour->id) }}"
                                                   class="btn btn-light btn-icon-split" spellcheck="false">
                                                    <span class="icon text-gray-600">
                                                        <i class="far fa-edit"></i>
                                                    </span>
                                                    <span class="text">Modifier</span>
                                                </a>
                                            </td>
                                            <td>{{ $valid_hour->id }}</td>
                                            <td>{{ $valid_hour->date }}</td>
                                            <td>{{ $valid_hour->hour->name }}</td>
                                            <td>{{ $valid_hour->user->name ?? 'N/A' }}</td>
                                            <td>{{ $valid_hour->user->team->name ?? 'N/A' }}</td>
                                            <td>{{ $valid_hour->timer_one ?? '' }}</td>
                                            <td>{{ $valid_hour->taskOne->name ?? '' }}</td>
                                            <td>{{ $valid_hour->subtaskOne->name ?? '' }}</td>
                                            <td>{{ $valid_hour->number_one ?? '' }}</td>
                                            <td>{{ $valid_hour->projectOne->name ?? '' }}</td>
                                            <td>{{ $valid_hour->stageOne->name ?? '' }}</td>
                                            <td>{{ $valid_hour->coment_one ?? '' }}</td>
                                            <td>{{ $valid_hour->timer_two ?? '' }}</td>
                                            <td>{{ $valid_hour->taskTwo->name ?? '' }}</td>
                                            <td>{{ $valid_hour->subtaskTwo->name ?? '' }}</td>
                                            <td>{{ $valid_hour->number_two ?? '' }}</td>
                                            <td>{{ $valid_hour->projectTwo->name ?? '' }}</td>
                                            <td>{{ $valid_hour->stageTwo->name ?? '' }}</td>
                                            <td>{{ $valid_hour->coment_two ?? '' }}</td>
                                            <td>{{ $valid_hour->timer_three ?? '' }}</td>
                                            <td>{{ $valid_hour->taskThree->name ?? '' }}</td>
                                            <td>{{ $valid_hour->subtaskThree->name ?? '' }}</td>
                                            <td>{{ $valid_hour->number_three ?? '' }}</td>
                                            <td>{{ $valid_hour->projectThree->name ?? '' }}</td>
                                            <td>{{ $valid_hour->stageThree->name ?? '' }}</td>
                                            <td>{{ $valid_hour->coment_three ?? '' }}</td>
                                            <td>{{ $valid_hour->timer_four ?? '' }}</td>
                                            <td>{{ $valid_hour->taskFour->name ?? '' }}</td>
                                            <td>{{ $valid_hour->subtaskFour->name ?? '' }}</td>
                                            <td>{{ $valid_hour->number_four ?? '' }}</td>
                                            <td>{{ $valid_hour->projectFour->name ?? '' }}</td>
                                            <td>{{ $valid_hour->stageFour->name ?? '' }}</td>
                                            <td>{{ $valid_hour->coment_four ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            @if(Gate::any(['user_manage', 'finance_manage']))
                                {{ $valid_hours->links('pages.pagination') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.scripts')
@endsection
