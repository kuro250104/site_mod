@extends('pages.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Modification de l'opérateur</h1>
        </div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Opérateurs</h1>
{{--        <p class="mb-4">Modification de {{ $worker->name }} {{$worker->surname}}</p>--}}

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
