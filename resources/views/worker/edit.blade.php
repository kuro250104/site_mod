@extends('pages.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Modification de l'opérateur</h1>
        </div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Opérateurs</h1>
        {{dd($worker)}}
        <p class="mb-4">Modification de {{ $worker->name }} {{$worker->surname}}</p>
        <form action="{{ route('worker.update', $worker->id)}}" method="POST"
              class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            @method("PUT")
            @csrf
            <div class="input-group">
                <input type="text" name="surname" class="form-control bg-light border small"
                       placeholder="Modifier le nom de famille" aria-label="Search" aria-describedby="basic-addon2"
                       value="{{ $worker->surname }}">
                <input type="hidden" name="worker_id" value='{{$worker->id}}'>
                <input type="text" name="name" class="form-control bg-light border small"
                       placeholder="Modifier le prénom" aria-label="Search" aria-describedby="basic-addon2"
                       value="{{ $worker->name }}">
                <input type="hidden" name="worker_id" value='{{$worker->id}}'>
                <select type="text" name="team_id" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                    <option value="{{$worker->team->id}}">{{$worker->team->name}}</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}"> {{ $team->name }}</option>
                    @endforeach
                </select>
                <select type="text" name="status_id" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
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
        </form>
{{--        <form action="" method="POST"--}}
{{--              class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">--}}
{{--            @method("delete")--}}
{{--            @csrf--}}

{{--            <button type="submit" class="btn btn-danger btn-icon-split" spellcheck="false">--}}
{{--                    <span class="icon text-white-50">--}}
{{--                        <i class="fas fa-trash"></i>--}}
{{--                    </span>--}}
{{--                <span class="text">Supprimer</span>--}}
{{--            </button>--}}
{{--        </form>--}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ \Session::get('error') }}</li>
                </ul>
            </div>
        @endif
    </div>

@endsection
