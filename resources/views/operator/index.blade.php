@extends('pages.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gestion des opérateurs</h1>
    </div>
    <div id="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nom / Prénom</th>
                            <th>Equipe</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->team->name ?? ""}}</td>
                            <td>{{$user->status->name ?? ""}}</td>
                            <td class="custom-td">
                                <a href="{{route('operator.edit', $user->id)}}" class="btn btn-light btn-icon-split" spellcheck="false">
                                    <span class="icon text-gray-600">
                                        <i class="far fa-edit"></i>
                                    </span>
                                    <span class="text">Modifier</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nom / Prénom</th>
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
