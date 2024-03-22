@extends('pages.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Vue de l'équipe {{$team->name}}</h1>
        </div>

        <a href="{{route('team.index')}}" class="btn btn-icon-split" spellcheck="false">
                    <span class="icon">
                        <i class="fas fa-arrow-left"></i>
                    </span>
            <span class="text">Retour</span>
        </a>
        <div id="content">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable">
                        <thead>
                        <tr>
                            <th>Membres de l'équipe {{$team->name}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($arrayUser as $user)
                            <tr>

                                <td style="width: 50%;"> {{$user['name']}}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
{{--
            {{ $teams->links('pages.pagination') }}--}}
                </div>
            </div>
        </div>
    </div>


@endsection
