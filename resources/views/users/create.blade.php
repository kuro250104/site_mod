@extends('pages.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb mb-4">
                <div class="pull-left">
                    <h2>Créé un nouvel utilisateur
                        <div class="float-end">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </h2>
                </div>
            </div>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Nom et prénom:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Nom et prénom">
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Mot de passe:</strong>
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Confirmer le mot de passe:</strong>
                        <input type="password" name="confirm-password" class="form-control" placeholder="Confirmer le mot de passe">
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Role:</strong>
                        <select name="roles" class="form-control multiple">
                            <option>Veuillez sélectionnez un role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Equipe:</strong>
                        <select name="teams" class="form-control multiple">
                            <option>Veuillez sélectionnez une equipe</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </div>
        </form>
    </div>


@endsection
