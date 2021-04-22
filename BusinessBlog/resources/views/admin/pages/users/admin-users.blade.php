@extends('admin.layout.admin-layout')
@section('admnContent')
    <div class="col-lg-10 admin-right d-flex justify-content-around flex-wrap">
        <div class="container-fluid">
            @if($users)
                @foreach($users as $user)
                    <div class="col-lg-8 admin-comments">
                        <div class="card">
                            <h5 class="card-header">{{$user->name.' '.$user->surname}}</h5>
                            <div class="card-body">
                                <p class="card-text">Id: {{$user->users_id}}</p>
                                <p class="card-text">Email: {{$user->email}}</p>

                                    @if($user->roles_id == 1)
                                        @if($roles)
                                        <form method="POST" action="{{route('users.update',$user->users_id)}}">
                                            <label for="updateUserRole">Role :</label>
                                                <select class="form-control" id="updateUserRole" name="updateUserRole">
                                                    @foreach($roles as $role)
                                                    <option value="{{$role->roles_id}}" @if($user->roles_id == $role->id) selected @endif>{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <input type="submit" class="btn btn-primary" value="Update">
                                        </form>
                                        <br>
                                            <form method="POST" action="">
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                        @endif

                                    @endif
                                    @if($user->roles_id == 2)
                                        <p class="card-text">Role: admin</p>
                                    @endif
                                <br>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
