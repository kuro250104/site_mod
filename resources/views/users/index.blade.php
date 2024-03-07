@extends('pages.app')


@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb mb-4">
                        <div class="pull-left">
                            <h2>Gestion des utilisateurs
                                <div class="float-end">
                                    <a class="btn btn-success" href="{{ route('users.create') }}"> Création d'un nouvel utilisateur</a>
                                </div>
                            </h2>

                        </div>

                    </div>

                </div>
                <div class="alert alert-warning ">
                    <p>Attention, la gestion de la modification des utilisateurs n'est pas active pour le moment. Aucune modification ne sera enregistrée.
                        <br>Pour effectuer  des modifications, veuillez contacter votre administrateur.</p>
                </div>


                @if ($message = Session::get('success'))
                    <div class="alert alert-success my-2">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="table-responsive">


                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th width="450px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-secondary text-dark">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary btn-icon-split" href="{{ route('users.show',$user->id) }}">
                                            <span class="icon text-gray-600">
                                                <i class="far fa-eye"></i>
                                            </span>
                                          <span class="text">Voir</span>
                                        </a>
                                        <a class="btn btn-info btn-icon-split" href="{{route('users.edit',$user->id)}}">
                                                <span class="icon text-gray-600">
                                                    <i class="far fa-edit"></i>
                                                </span>
                                            <span class="text">Modifier</span>
                                        </a>
                                        <a class="btn btn-danger btn-icon-split" href="{{route('users.destroy',$user->id)}}" >
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            <span class="text">Supprimer</span>
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


@endsection
