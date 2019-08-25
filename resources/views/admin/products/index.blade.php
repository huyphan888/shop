<?php /** @var \App\product $product */ ?>
@extends('admin.template.master')
@section('header')
    <style>
        .card-body img {
            width: 100px;
            height: 62px;
        }
    </style>
@stop
@section('content')
    <div class="row">

        <div class="col-12">


            <div class="card mb-3">

                <div class="card-header">

                     <span class="pull-left">
                    <form action="" method="get">
                        <input type="text" name="search" value="{{request('search')}}" placeholder="Search Code or name..." style="padding: 3px;">
                        <input type="submit" value="Search" class="btn btn-warning btn-sm" style="margin-top: -4px;">
                    </form>

                    </span>
                    <span class="pull-right">
                         <form action="{{route('products.bulk')}}" method="post" id="deleteAll" class="form-inline">
                             @csrf
                             @method('delete')
                             <select name="bulk" id="deleteAll" class="form-control">
                                 <option value="">Bulk options</option>
                                 <option value="delete">Delete</option>
                             </select>
                             <input type="button" name="" value="submit" class="btn btn-danger" onclick="document.getElementById('deleteAll').submit()">


                    </span>

                </div>
                <!-- end card-header -->

                <div class="card-body">


                    <div class="table-responsive" id="table">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width:4px"><input type="checkbox" name="options"></th>
                                <th style="width:50px">Code</th>
                                <th >Product title</th>
                                <th style="width:130px">Price</th>
                                <th style="width:100px">Category</th>
                                <th>View post</th>
                                <th>View comments</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)

                            <tr>
                                <td><input type="checkbox" name="delete[]" value="{{$product->id}}" class="myCheckbox"></td>

                                <td>
                                    <span class="badge badge-danger" style="font-size: 11px">{{$product->code}}</span>
                                </td>
                                <td>
                                    <span style="float: left; margin-right:10px;">
                                        <a href="{{route('products.edit',$product->id)}}"><img style="width:70px;" src="{{$product->image!='/images/'?$product->image:asset('uploads/no_image.jpg')}}"/></a>

                                    </span>
                                    <h5><a href="{{route('products.edit',$product->id)}}"> {{$product->name}}</a> </h5>Posted by <b>{{$product->user->name}}</b> {{showTimeAgo($product->updated_at)}}<br>

                                </td>


                                <td>{{format($product->sale_price)}}<br><p style="text-decoration: line-through;font-size: 12px;">{{format($product->original_price)}}</p></td>



                                <td><span class="badge badge-success">{{$product->cate->name}}</span></td>
                                <td><a href="{{route('frontend.detail',[$product->cate->slug,str_slug($product->name),$product->id])}}" class="btn btn-outline-dark">
                                        <i class="fa fa-link"></i>
                                        View post
                                    </a></td>
                                <td>
                                    @if($product->comments)
                                    <a href="{{route('replies.show',$product->id)}}" class="btn btn-outline-warning">{{$product->comments()->count()}} comments</a>
                                    @endif
                                </td>



                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No data</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>

                    </form>
                </div>
                <!-- end card-body -->


            </div>
            <!-- end card -->

        </div>
        <!-- end col -->

    </div>
@endsection
