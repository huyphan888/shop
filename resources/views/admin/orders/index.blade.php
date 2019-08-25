<?php /** @var \App\order $order */ ?>
@extends('admin.template.master')
@section('content')
    <div class="row">

        <div class="col-12">

            <div class="card mb-3">

                <div class="card-header">


                    <h3><i class="fa fa-order"></i> All orders ({{$orders->count()}} orders)</h3>
                </div>
                <!-- end card-header -->

                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width:50px">ID</th>
                                <th>Email</th>
                                <th>Phone</th>

                                <th style="width:150px">Have Account?</th>
                                <th style="width:180px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($orders as $order)

                                <tr>
                                    <th>
                                        {{$order->id}}
                                    </th>

                                    <td>
                                    {{$order->email}}
                                    </td>

                                    <td>
                                       {{$order->phone}}
                                    </td>


                                    <td style="text-align:center;">
                                        @if($order->user_id == NULL)
                                            <i class="fa fa-1x fa-times" style="color:red"></i>
                                        @else
                                            <i class="fa fa-1x fa-check" style="color:green"></i>
                                        @endif
                                    </td>

                                    <td>
                                        <form action="{{route('orders.destroy',$order->id)}}" method="post"
                                              id="form{{$order->id}}">
                                            @csrf
                                            @method('delete')

                                        </form>
                                        <a href="{{route('orders.show',$order->id)}}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-street-view" aria-hidden="true"></i> Detail</a>



                                        <a href="javascript:void()" class="btn btn-danger btn-sm" onclick="document.getElementById('form{{$order->id}}').submit()">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No data</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                        {{--{{$orders->links()}}--}}
                    </div>


                </div>
                <!-- end card-body -->

            </div>
            <!-- end card -->

        </div>
        <!-- end col -->

    </div>

@endsection
