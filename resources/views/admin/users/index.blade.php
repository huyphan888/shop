<?php /** @var \App\user $user */ ?>
@extends('admin.template.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <!-- start card header-->
                <div class="card-header">
                    <a href="{{route('users.create')}}">
                    <span class="pull-right">
                        <button class="btn btn-success btn-sm">
                            <i class="fa fa-plus-circle"></i>
                            Add new user
                        </button>
                    </span>
                    </a>

                    <h3><i class="fa fa-user"></i> All users</h3>
                </div>
                <!-- end card-header -->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width:50px">ID</th>
                                <th>Name</th>
                                <th style="width:130px">Role</th>
                                <th style="width:150px">Status</th>
                                <th style="width:165px">created at</th>

                                <th style="width:200px">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <span style="float: left; margin-right:10px;">
                                        <a href="{{route('users.edit',$user->id)}}">
                                            <img style="height:70px;" src="{{$user->img?asset($user->img):asset('uploads/no_image.jpg')}}"/></a>
                                    </span>
                                    <a href="{{route('users.edit',$user->id)}}"><strong>{{$user->name}}</strong></a>
                                    <br/>
                                    <small>{{$user->email}}</small>
                                </td>


                                <td>
                                  {{$user->role->name}}
                                </td>


                                <td>{{$user->isActive?'active':'no active'}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>

                                <td>

                                    <form action="{{route('users.destroy',$user->id)}}" method="post"
                                          id="form{{$user->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit" aria-hidden="true"> Edit</i>
                                    </a>

                                    <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault();document.getElementById('form{{$user->id}}').submit()">
                                        <i class="fa fa-trash-o" aria-hidden="true"> Delete</i>
                                    </a>


                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>


                </div>
                <!-- end card-body -->

            </div>
            <!-- end card -->

        </div>
        <!-- end col -->

    </div>

@endsection
