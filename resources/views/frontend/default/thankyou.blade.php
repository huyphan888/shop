@extends('frontend.layout.master')
@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible show" role="alert">
            {{{session('success')}}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@stop
