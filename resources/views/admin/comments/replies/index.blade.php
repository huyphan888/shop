<?php /** @var \App\comment $comment */ ?>
@extends('admin.template.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <!-- start card header-->
                <div class="card-header">

                    <h3><i class="fa fa-comment"></i> All comments comments</h3>
                </div>
                <!-- end card-header -->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width:50px">ID</th>
                                <th>Name</th>
                                <th>content</th>

                                <th style="width:165px">created at</th>
                                <th>Action</th>
                                <th>View comment</th>

                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($comments as $comment)
                                <tr @if(!$comment->is_active) style="background-color:#ccc" @endif>
                                    <th>{{$comment->id}}</th>
                                    <td>
                                    <span style="float: left; margin-right:10px;">
                                        <a href="{{route('comments.edit',$comment->id)}}"><img style="height:70px;" src="{{$comment->photo?$comment->photo:'http://placehold.it/120x70'}}"/></a>
                                    </span>
                                        <a href="{{route('comments.edit',$comment->id)}}"><strong>{{$comment->name}}</strong></a>
                                        <br/>
                                        <small>{{$comment->email}}</small>
                                    </td>


                                    <td>{{str_limit($comment->content,30)}}</td>


                                    <td>{{$comment->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if($comment->is_active)
                                            <a href="{{route('comments.show',$comment->id)}}" class="btn btn-success btn-sm">Unapprove</a>
                                        @else
                                            <a href="{{route('comments.show',$comment->id)}}" class="btn btn-warning btn-sm">Approve</a>
                                        @endif


                                    </td>
                                    <td><a href="{{route('frontend.detail',[$comment->product->cate->slug,str_slug($comment->product->name),$comment->product->id])}}">link</a></td>

                                    <td>
                                        <form action="{{route('comments.destroy',$comment->id)}}" method="post"
                                              id="form{{$comment->id}}">
                                            @csrf
                                            @method('delete')
                                        </form>

                                        <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault();document.getElementById('form{{$comment->id}}').submit()">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Comment</td>
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
