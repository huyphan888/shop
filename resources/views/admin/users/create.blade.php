<?php /** @var \Illuminate\Support\ViewErrorBag $errors*/?>
<?php /** @var \App\user $user*/?>
@extends('admin.template.master')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mb-3">

            <div class="card-header">
                <h3><i class="fa fa-plus" style="color: green"></i> Add new user</h3>
            </div>
            <div class="card-body">



                {{-- phan thay doi --}}
                <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    {!! input('name') !!}
                    {!! input('email') !!}
                    {!! input('img',null,'file') !!}
                   {!! select('isActive',['in-active', 'active']) !!}
                   {!! select('role_id',$role) !!}
                    {!! input('password',null,'password') !!}
                    {!! input('password_confirmation',null,'password') !!}
                    {!! submit() !!}

                </form>
                {{-- end phan thay doi --}}





            </div>
        </div>
    </div>

</div>

@endsection
