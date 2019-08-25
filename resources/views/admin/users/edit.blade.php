<?php /** @var \Illuminate\Support\ViewErrorBag $errors*/?>
<?php /** @var \App\user $user*/?>
@extends('admin.template.master')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-pencil" style="color: red"></i> Edit user {{$user->name}}</h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-3">
                            <img src="{{$user->img?asset($user->img):asset('uploads/no_image.jpg')}}" alt="" width="200" style="-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;">
                        </div>
                        <div class="col-9">
                            {{-- phan thay doi --}}
                            <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                {!! input('name',$user->name) !!}
                                {!! input('email',$user->email) !!}
                                {!! input('img',null,'file') !!}
                                {!! select('isActive',['in-active', 'active'],$user->isActive) !!}
                                {!! select('role_id',$role,$user->role_id) !!}
                                {!! input('password',null,'password') !!}
                                {!! input('password_confirmation',null,'password') !!}
                                {!! submit() !!}

                            </form>
                            {{-- end phan thay doi --}}
                        </div>
                    </div>
                </div>{{--end card body--}}
            </div><!-- end card-->
        </div>

    </div>



@endsection
