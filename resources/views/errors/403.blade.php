@extends('errors::minimal')
@section('title', __('trang khong ton tai'))
@section('code')
    <img src="{{asset('themes/default/assets/images/www/4-580x318.jpg')}}" alt="">

@stop
@section('message')

    please click <a href="{{url('/')}}">home</a> to move back
@stop
