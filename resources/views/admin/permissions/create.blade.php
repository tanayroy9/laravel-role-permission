@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Permission</h2>
        <form method="POST" action="{{ route('permissions.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Permission Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Save</button>
        </form>
    </div>
@endsection
