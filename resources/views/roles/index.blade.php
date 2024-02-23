@extends('pages.app')


@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb mb-4">
                        <div class="pull-left">
                            <h2>Role Management
                                <div class="float-end">
                                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>


                @if ($message = Session::get('success'))
                    <div class="alert alert-success my-2">
                        <p>{{ $message }}</p>
                    </div>
                   @endif


                <table class="table table-striped table-hover" id="dataTable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role )
                        <tr>
                            <td>{{ $role->name}}</td>
                            <td>
                                <form action="{{ route('roles.destroy', $role->id)   }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                                    @can ('role_manage' )
                                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id)  }}">Edit</a>
                                    @endcan
                                    @csrf
                                    @method        ('DELETE')
                                    @can  ('role_manage'     )
                                        <button type="submit" class="btn btn-danger">Delete</button>
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


@endsection


