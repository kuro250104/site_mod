@extends('pages.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gestion des opérateurs</h1>
    </div>

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
                <button type="submit" class="btn btn-success btn-icon-split" spellcheck="false">
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
    <div id="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable">
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
                                    <td style="width: 33%;">{{$worker->surname}}</td>
                                    <td style="width: 33%;">{{$worker->name}}</td>
                                    <td style="width: 33%;">{{$worker->team->name}}</td>
                                    <td style="width: 33%;">{{$worker->status->name}}</td>

                                    <td class="custom-td">
                                        <a href="{{route('worker.edit', $worker->id)}}" class="btn btn-light btn-icon-split" spellcheck="false">
                                        <span class="icon text-gray-600">
                                            <i class="far fa-edit"></i>
                                        </span>
                                            <span class="text">Modifier</span>
                                        </a>
                                        <a href="#" class="btn btn-light btn-icon-split" spellcheck="false">
                                        <span class="icon text-gray-600">
                                            <i class="far fa-eye"></i>
                                        </span>
                                            <span class="text">Voir</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $workers->links('pages.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
