@extends('pages.app')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bienvenue sur la page d'accueil</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Notes de mise à jour</h6>
                    </div>
                    <div class="card-body">
                        <h5>Nouvelle fonctionnalité</h5>
                        <p>- Affichage du temps total saisi</p>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Heures validées</h6>
                    </div>
                    <div class="card-body">
                        <a class="link-offset-1" href="{{route('validated_hour.index')}}">Cliquez-ici</a> pour accéder à la page des heures validées
                    </div>
                </div>
                @can('user_manage')
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-warning">Gestion des opérateurs</h6>
                    </div>
                    <div class="card-body">
                        <a class="link-offset-1" href="{{route('operator.index')}}">Cliquez ici</a> pour accéder à la page des opérateurs
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
