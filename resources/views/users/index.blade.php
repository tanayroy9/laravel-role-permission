@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 my-3">
                <div class="float-start py-3">
                    <h4>Users Management</h4>
                </div>
                @can('user-create')
                <div class="float-end py-3">
                    <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}"> Create New User</a>
                </div>
                @endcan
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <div>{{ $message }}</div>
            </div>

        @endif
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <tr>
                        <th>SL.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <label class="badge bg-secondary">{{ $v }}</label>
                                    @endforeach
                                @endif

                            </td>
                            <td>
                                <a class="btn btn-info btn-sm text-white"
                                   href="{{url('users/'.$user->id)}}" >Show</a>
                                @can('user-edit')
                                    <a class="btn btn-primary btn-sm"
                                       href="{{ route('users.edit',$user->id) }}">Edit</a>
                                @endcan
                                @can('user-delete')
                                    <form method="POST" action="{{route('users.destroy', $user->id)}}"
                                          style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete"
                                               onclick="return confirm('Are you sure you want to delete?')">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                </table>
                {!! $data->render() !!}

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td id="name"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td id="phone"></td>
                        </tr>
                        <tr>
                            <th>Linkedin</th>
                            <td id="linkedin"></td>
                        </tr>
                        <tr>
                            <th>Weekly Availability (Hr)</th>
                            <td id="weekly"></td>
                        </tr>
                        <tr>
                            <th>Hourly asking rate</th>
                            <td id="rate"></td>
                        </tr>
                        <tr>
                            <th>Skills</th>
                            <td id="skill"></td>
                        </tr>
                        <tr>
                            <th>Skill level</th>
                            <td id="skill_level"></td>
                        </tr>
                        <tr>
                            <th>Skill Area</th>
                            <td id="skill_area"></td>
                        </tr>
                        <tr>
                            <th>Project Interests</th>
                            <td id="project"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(document).ready(function () {
        /* When click show user */
        $('body').on('click', '#show-details', function () {
            var userURL = $(this).data('url');
            $.get(userURL, function (data) {
                $('#exampleModal').modal('show');
                $('#name').text(data.name)
                $('#email').text(data.email)
                $('#phone').text(data.phone)
                $('#linkedin').text(data.profile.linkedin)
                $('#weekly').text(data.profile.rate_type)
                $('#rate').text(data.profile.hourly_rate)
                $('#skill').text(data.profile.skills)
                $('#skill_level').text(data.profile.skill_level)
                $('#designation').text(data.profile.designation)
                $('#skill_area').text(data.profile.skill_area)
                $('#project').text(data.profile.project_interest)
            })
        });
    });
</script>
@endsection
