@extends('pages.app')


@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Mise à jour du profil</h1>
    </div>
    <div class="card-body">
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
        <div class="max-w-xl">
            @include('profile.update')
        </div>
    </div>
</div>


@endsection
