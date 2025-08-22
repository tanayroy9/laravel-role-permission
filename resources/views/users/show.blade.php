@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Profile details') }}
                        <a href="{{url('users/'.$user->id.'/edit')}}"><i class="fa fa-edit"></i> </a>
                        <a href="{{url('users')}}" class="btn btn-primary btn-sm float-end">Back</a>
                    </div>
                    <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success" role="alert" class="text-danger">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label"><strong>Avatar:</strong> </label>
                                    @if($user->avatar)
                                        <img src="{{asset('avatars/'. $user->avatar) }}" style="width: 80px; margin-top: 10px">
                                    @else
                                        <img src="{{asset('avatars/profile.png')}}" style="width: 80px; margin-top: 10px">
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label"><strong>Name to Show in Profile:<span class="text-danger">*</span></strong> </label>
                                    <input class="form-control" type="text" id="name" name="name" readonly value="{{ $user->name }}" autofocus="" disabled>
                                    @error('name')
                                    <span role="alert" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label"><strong>Email:<span class="text-danger">*</span></strong> </label>
                                    <input class="form-control" type="text" id="email" name="email" value="{{ $user->email }}" autofocus="" readonly disabled>
                                    @error('email')
                                    <span role="alert" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="phone" class="form-label"><strong>Phone:<span class="text-danger">*</span></strong> </label>
                                    <input class="form-control" type="text" id="phone" name="phone" value="{{ $user->phone }}"  readonly disabled>
                                    @error('phone')
                                    <span role="alert" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="linkedin" class="form-label"><strong>Linkedin:<span class="text-danger">*</span></strong> </label>
                                    <input class="form-control" type="text" id="linkedin" name="linkedin" readonly value="{{$user->profile->linkedin??''}}"  disabled>
                                    @error('linkedin')
                                    <span role="alert" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="phone" class="form-label"><strong>Profile Picture:</strong> </label>


                                    <div class="mb-3 col-md-6">
                                        @if($user->profile)
                                            <img src="{{asset('profile_picture/'. $user->profile->profile_picture) }}" style="width: 80px; margin-top: 10px">
                                        @else
                                            <img src="{{asset('avatars/profile.png')}}" style="width: 80px; margin-top: 10px">
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
