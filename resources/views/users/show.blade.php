
@extends('pages.app')


@section('content')
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 margin-tb mb-4">
                  <div class="pull-left">
                      <h2>Utilisateur</h2>
                      <div class="float-end">
                          <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                      </div>
                  </div>
              </div>
          </div>

          <table class="table table-bordered table-hover table-striped">
              <tr>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Rôle</th>
              </tr>
              <tr>
                  <td>{{ $user->name }}</td>
                  <td > <a href="mailto:{{ $user->email }}"> {{ $user->email }}</a>
                  <td>
                      @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                              <label class="badge badge-secondary text-dark">{{ $v }}</label>
                          @endforeach
                      @endif
                  </td>
              </tr>
          </table>
      </div>

@endsection
