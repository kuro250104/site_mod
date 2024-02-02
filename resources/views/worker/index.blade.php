@extends('pages.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gestion des opérateurs</h1>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <input type="search" class="form-control  bg-light border-black small" id="dataTable_filter" placeholder="Recherche par nom..." aria-label="Search" aria-describedby="basic-addon2">

    </div>

    <div class="card shadow mb-4">
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Ajouter un nouvel opérateur </h6>
        </a>
        <div class="collapse show" id="collapseCardExample" style="">
            <div class="card-body">
                <form action="{{ route('worker.store')}}" method="POST" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="surname" class="form-control bg-light border small" value="{{old('surname')}}" placeholder="Nom" aria-label="Search" aria-describedby="basic-addon2">

                        <input type="text" name="name" class="form-control bg-light border small" value="{{old('name')}}" placeholder="Prénom" aria-label="Search" aria-describedby="basic-addon2">
                        <select type="text" name="team_id" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="">Choisissez une équipe</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}"> {{ $team->name }}</option>
                            @endforeach
                        </select>
                        <select type="text" name="status_id" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                            <option value="">Etat de l'opérateur</option>
                            @foreach($status as $statu)
                                <option value="{{ $statu->id }}"> {{ $statu->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btns  btn btn-success btn-icon-split" spellcheck="false">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                                <span class="text">Valider</span>
                            </button>
                        </div>
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


    <div id="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Equipes</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workers as $worker)
                        <tr>
                            <td>{{$worker->surname}}</td>
                            <td>{{$worker->name}}</td>
                            <td>{{$worker->team->name}}</td>
                            <td>{{$worker->status->name}}</td>

                            <td class="custom-td">
                                <a href="{{route('worker.edit', $worker->id)}}" class="btn btn-light btn-icon-split" spellcheck="false">
                                    <span class="icon text-gray-600">
                                        <i class="far fa-edit"></i>
                                    </span>
                                    <span class="text">Modifier</span>
                                </a>
{{--                                <a href="#" class="btn btn-light btn-icon-split" spellcheck="false">--}}
{{--                                    <span class="icon text-gray-600">--}}
{{--                                        <i class="far fa-eye"></i>--}}
{{--                                    </span>--}}
{{--                                    <span class="text">Voir</span>--}}
{{--                                </a>--}}
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Equipes</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
















@endsection
