@extends('pages.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Modification de l'opérateur</h1>
        </div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Opérateur</h1>

        <p class="mb-4">Modification de {{ $user->name }} </p>
        <form action="{{ route('operator.update', $user->id)}}" method="POST"
              class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            @method("PUT")
            @csrf
            <div class="input-group">
                <input type="text" name="name" class="form-control bg-light border small" placeholder="Modifier le prénom" aria-label="Search" aria-describedby="basic-addon2" value="{{ $user->name }}">
                <select type="text" name="team_id" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                    <option value="{{$user->team->id ?? ""}}">{{$user->team->name ?? ""}}</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}"> {{ $team->name }}</option>
                    @endforeach
                </select>
                <select type="text" name="status_id" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                    <option value="{{$user->status->id ?? ""}}">{{$user->status->name ?? ""}}</option>
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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

@endsection
