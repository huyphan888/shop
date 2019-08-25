<?php /** @var \Illuminate\Support\ViewErrorBag $errors*/?>
<?php /** @var \App\media $media*/?>
@extends('admin.template.master')
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-3">

            <div class="card-header">
                <h3><i class="fa fa-plus" style="color: green"></i> Add media</h3>
            </div>
            <div class="card-body">

                {{-- phan thay doi --}}
                <form action="{{route('medias.store')}}" method="post" class="dropzone">
                @csrf
                </form>
                {{-- end phan thay doi --}}


            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
@stop