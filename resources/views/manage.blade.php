@extends('layouts.app')

@section('content')
<div class="container">
    @if( Auth::user()->is_admin)
        <div class="row">
            <div class="col-md-8">
                <div class="post-content">
                    <div class="post-container">
                        <img src={{ Auth::user()->avatar }} alt="user" class="profile-photo-md pull-left mb-2"><h3 class="mt-3">&ensp; Manage Users</h3>
                        <table class="table table-dark">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Total Posts</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td><img src={{ $user->avatar }} alt="user" class="profile-photo-md pull-left mb-2"></td>
                                    <td><a href="{{ URL::to('/');}}{{'/profile/'}}{{ $user->id }}">{{$user->name}}</a></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{ count($user->posts) }}</td>
                                    <td style="text-align: center;">
                                        @if(!$user->is_admin)
                                        <a class="btn btn-primary" href="{{ URL::to('/');}}{{'/make-admin/'}}{{$user->id}}">Make Admin</a>
                                        @endif
                                        @if(Auth::user()->id != $user->id)
                                        <a class="mt-1 btn btn-danger" href="{{ URL::to('/');}}{{'/delete-user/'}}{{$user->id}}">Delete User</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if( !Auth::user()->is_admin )
    <h3 style="text-align: center; color: red;">You Don't Have Permission To view this page</h3>
    @endif
</div>
@endsection
