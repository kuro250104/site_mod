@extends('pages.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des heures validés</h1>
        </div>
        <div class="card shadow mb-4">
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Formulaire de validation d'heures</h6>
            </a>
            <div class="collapse show" id="collapseCardExample" style="">
                <div class="card-body">
                    <form action="{{route('validated_hour.store')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <select type="text" name="worker_id" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                                <option value="">Séléctionnez un opérateur</option>
                                @foreach($workers as $worker)
                                    <option value="{{ $worker->id }}"> {{ $worker->surname }} {{ $worker->name }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="timer" class="form-control bg-light border small" value="{{old('time')}}"
                                   placeholder="Temps total" aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                        <p>Tâche 1</p>

                        <div class="input-group">
                            <input type="text" name="number_one" class="form-control bg-light border small" value="{{old('name')}}"
                                   placeholder="Numéro de l'OP" aria-label="Search" aria-describedby="basic-addon2">
                            <input type="text" name="timer_one" class="form-control bg-light border small" value="{{old('time_one')}}"
                                   placeholder="Temps de la tâche" aria-label="Search" aria-describedby="basic-addon2">
                            <select type="text" name="task_one" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                                <option value="">Choisissez une tâche</option>
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}"> {{ $task->name }}</option>
                                @endforeach
                            </select>
                            <select type="text" name="project_one" id="project_one" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                                <option value="">Choisissez un projet</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}"> {{ $project->name }}</option>
                                @endforeach
                            </select>
                            <select type="text" name="stage_one" id="stage_one" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                                <option value="">Choisissez un stade</option>
                                @foreach($stages as $stage)
                                    <option value="{{ $stage->id }}"> {{ $stage->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <p>Tâche 2</p>
                        <div class="input-group">
                            <input type="text" name="number_two" class="form-control bg-light border small" value="{{old('name')}}"
                                   placeholder="Numéro de l'OP" aria-label="Search" aria-describedby="basic-addon2">
                            <input type="text" name="timer_two" class="form-control bg-light border small" value="{{old('timer_two')}}"
                                   placeholder="Temps de la tâche" aria-label="Search" aria-describedby="basic-addon2">
                            <select type="text" name="task_two" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                                <option value="">Choisissez une tâche</option>
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}"> {{ $task->name }}</option>
                                @endforeach
                            </select>
                            <select type="text" name="project_two" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                                <option value="">Choisissez un projet</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}"> {{ $project->name }}</option>
                                @endforeach
                            </select>
                            <select type="text" name="stage_two" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                                <option value="">Choisissez un stade</option>
                                @foreach($stages as $stage)
                                    <option value="{{ $stage->id }}"> {{ $stage->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <p>Tâche 3</p>
                        <div class="input-group">
                            <input type="text" name="number_three" class="form-control bg-light border small" value="{{old('name')}}"
                                   placeholder="Numéro de l'OP" aria-label="Search" aria-describedby="basic-addon2">
                            <input type="text" name="timer_three" class="form-control bg-light border small" value="{{old('timer_three')}}"
                                   placeholder="Temps de la tâche" aria-label="Search" aria-describedby="basic-addon2">
                            <select type="text" name="task_three" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                                <option value="">Choisissez une tâche</option>
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}"> {{ $task->name }}</option>
                                @endforeach
                            </select>
                            <select type="text" name="project_three" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                                <option value="">Choisissez un projet</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}"> {{ $project->name }}</option>
                                @endforeach
                            </select>
                            <select type="text" name="stage_three" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                                <option value="">Choisissez un stade</option>
                                @foreach($stages as $stage)
                                    <option value="{{ $stage->id }}"> {{ $stage->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success btn-icon-split" spellcheck="false"><span class="icon text-white-50"><i class="fas fa-check"></i></span>
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
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tableau des heures</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Membres de l'équipe </th>
                                            <th>Équipe </th>
                                            <th>Tâche 1</th>
                                            <th>Numéro d'OP 1</th>
                                            <th>Projet 1</th>
                                            <th>Stade 1</th>
                                            <th>Tâche 2</th>
                                            <th>Numéro d'OP 2</th>
                                            <th>Projet 2</th>
                                            <th>Stade 2</th>
                                            <th>Tâche 3</th>
                                            <th>Numéro d'OP 3</th>
                                            <th>Projet 3</th>
                                            <th>Stade 3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($valid_hours as $valid_hour)
                                        <tr>
                                            <td style="width: 7%" >{{$valid_hour->worker->name ?? 'N/A'}} {{$valid_hour->worker->surname ?? 'N/A'}}</td>
                                            <td style="width: 7%" >{{$valid_hour->worker->team->name ?? ''}}</td>
                                            <td style="width: 7%" >{{$valid_hour->taskOne->name ?? ''}} - {{$valid_hour->timer_one}} heures</td>
                                            <td style="width: 7%" >{{$valid_hour->number_one ?? ''}}</td>
                                            <td style="width: 7%" >{{$valid_hour->projectOne->name ?? ''}}</td>
                                            <td style="width: 7%" >{{$valid_hour->stageOne->name ?? ''}}</td>
                                            <td style="width: 7%" >{{$valid_hour->taskTwo->name ?? ''}}</td>
                                            <td style="width: 7%" >{{$valid_hour->number_two ?? ''}}</td>
                                            <td style="width: 7%" >{{$valid_hour->projectTwo->name ?? ''}}</td>
                                            <td style="width: 7%" >{{$valid_hour->stageTwo->name ?? ''}}</td>
                                            <td style="width: 7%" >{{$valid_hour->taskThree->name ?? ''}}</td>
                                            <td style="width: 7%" >{{$valid_hour->number_three ?? ''}}</td>
                                            <td style="width: 7%" >{{$valid_hour->projectThree->name ?? ''}}</td>
                                            <td style="width: 7%" >{{$valid_hour->stageThree->name ?? ''}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{ $valid_hours->links('pages.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>








@endsection
