@extends('pages.app')


@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb mb-4">
                        <div class="pull-left">
                            <h2>Gestion des rôles
                                <div class="float-end">
                                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Crée un nouveau rôle</a>
                                </div>
                            </h2>
                        </div>
                        <div class="alert alert-warning ">
                            <p>Attention, la gestion de la modification des rôles n'est pas active pour le moment. Aucune modification ne sera enregistrée.
                                <br>Pour effectuer  des modifications, veuillez contacter votre administrateur.</p>
                        </div>
                    </div>

                </div>


                @if ($message = Session::get('success'))
                    <div class="alert alert-success my-2">
                        <p>{{ $message }}</p>
                    </div>
                   @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th width="50%" align="center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $key => $role )
                            <tr>
                                <td>{{ $role->name}}</td>
                                <td>
                                    <form action="{{ route('roles.destroy', $role->id)   }}" method="POST">
                                        <a class="btn btn-secondary btn-icon-split" href="{{ route('roles.show', $role->id) }}">
                                            <span class="icon text-gray-600">
                                                <i class="far fa-eye"></i>
                                            </span>
                                            <span class="text">Voir</span>
                                        </a>
                                        @can ('role_manage' )
                                            <a class="btn btn-info btn-icon-split" href="{{ route('roles.edit', $role->id)  }}">
                                                <span class="icon text-gray-600">
                                                    <i class="far fa-edit"></i>
                                                </span>
                                                <span class="text">Modifier</span>
                                            </a>
                                        @endcan
                                        @csrf
                                        @method        ('DELETE')
                                        @can  ('role_manage'     )
                                            <button type="submit" class="btn btn-danger btn-icon-split">
                                                   <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Supprimer</span>
                                            </button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


@endsection


