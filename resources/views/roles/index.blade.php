@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h4>Role Management</h4>
            </div>
            <div class="float-end">
                @can('role-create')
                    <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}"> Create New Role</a>
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
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <!--<a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>-->
                    @can('role-edit')
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    {!! $roles->render() !!}
</div>
@endsection
