@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-start">
                    <h4>Permissions Management</h4>
                </div>
                <div class="float-end">
                    @can('permission-create')
                        <a class="btn btn-success btn-sm" href="{{ route('permissions.create') }}"> Create New Role</a>
                    @endcan
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>SL.No</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($permissions as $key => $permission)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                    <!--<a class="btn btn-info btn-sm" href="{{ route('roles.show',$permission->id) }}">Show</a>-->
                        @can('permission-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$permission->id) }}">Edit</a>
                        @endcan
                        @can('permission-delete')
                        @endcan
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
