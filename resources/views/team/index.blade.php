@extends('pages.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des équipes</h1>
        </div>
        <div class="card shadow mb-4">
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Ajouter une nouvelle équipe</h6>
            </a>
            <div class="collapse" id="collapseCardExample" style="">
                <div class="card-body">
                    <form action="{{ route('team.store')}}" method="POST"
                          class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" class="form-control bg-light border small" value="{{old('name')}}"
                                   placeholder="Nom de l'équipe" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success btn-icon-split" spellcheck="false">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                                    <span class="text">Ajouter</span>
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
                        <table class="table table-bordered " id="dataTable">
                            <thead>
                            <tr>
                                <th>Nom de l'équipe</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teams as $team)
                                <tr>
                                    <td style="width: 50%;">{{$team->name}}</td>
                                    <td class="custom-td">
                                        <a href="{{route('team.edit', $team->id)}}"
                                           class="btn btn-light btn-icon-split" spellcheck="false">
                                        <span class="icon text-gray-600">
                                            <i class="far fa-edit"></i>
                                        </span>
                                            <span class="text">Modifier</span>
                                        </a>
                                        <a href="{{route('team.view' , $team->id)}}" class="btn btn-light btn-icon-split" spellcheck="false">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
