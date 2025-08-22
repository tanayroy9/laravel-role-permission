@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-start">
                    <h2>Edit User</h2>
                </div>
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
            @csrf
         @method('PUT')

        <div class="row">
            <div class="col-6 py-1">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$user->name}}" placeholder="Enter Name" class="form-control">
                </div>
            </div>
            <div class="col-6 py-1">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" placeholder="Enter Email" value="{{$user->email}}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-3">
                <div class="form-group">
                    <strong>Role:</strong>
                    @foreach($roles as $role)
                        <label><input type="checkbox" name="roles[]" value="{{$role}}" {{in_array($role,$userRole)?'checked':''}}> {{$role}}</label>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to submit?')">Submit</button>
            </div>
        </div>
        </form>
    </div>
@endsection

