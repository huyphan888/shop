<?php /** @var \App\media $media */ ?>
@extends('admin.template.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <!-- start card header-->
                <div class="card-header">
                    <a href="{{route('medias.create')}}">
                    <span class="pull-right">
                        <button class="btn btn-success btn-sm">
                            <i class="fa fa-media-plus"></i>
                            Add new media
                        </button>
                    </span>
                    </a>

                    <h3><i class="fa fa-media"></i> All medias ({{$medias->total()}} medias)</h3>
                </div>
                <!-- end card-header -->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width:50px">ID</th>
                                <th>image</th>
                               
                                <th style="width:165px">created at</th>

                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($medias as $media)
                            <tr>
                                <td>{{$media->id}}</td>
                               
                                <td><img src="{{$media->file}}" alt="" width="100"></td>
                                
                                <td>{{$media->created_at->diffForHumans()}}</td>

                                <td>
                                    <form action="{{route('medias.destroy',$media->id)}}" method="post"
                                          id="form{{$media->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>

                                    <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault();document.getElementById('form{{$media->id}}').submit()">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
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
                        {{$medias->links()}}
                    </div>


                </div>
                <!-- end card-body -->

            </div>
            <!-- end card -->

        </div>
        <!-- end col -->

    </div>

@endsection
