<?php /** @var \Illuminate\Support\ViewErrorBag $errors*/?>
<?php /** @var \App\order $order*/?>
@extends('admin.template.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header bg-success">
                    <h4 style="color:white">User's information</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <label for="" class="col-2">Phone</label>
                        <div class="col-10">{{$order->phone}}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-2">Email</label>
                        <div class="col-10">{{$order->email}}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-2">Address</label>
                        <div class="col-10">{{$order->address}}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-2">Name</label>
                        <div class="col-10"><a href="{{route('users.edit',$order->user->id)}}">{{$order->user_id?$order->user->name:'null'}}</a></div>
                    </div>
                </div>
            </div><!-- end card-->
        </div>
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header bg-danger">
                    <h4 style="color: #fff;">Order ID: {{$order->id}}</h4>
                </div>


                <div class="card-body">
<table class="table table-bordered">
   <thead>
   <tr>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Sum</th>
   </tr>
   </thead>
    <tbody>
    <?php $total = 0; ?>
    @foreach($order->products as $item)
        <?php $total += ($sub=$item->pivot->quantity * $item->sale_price); ?>
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->pivot->quantity}}</td>
        <td>{{format($item->sale_price)}}</td>
        <td>{{format($sub)}}</td>
    </tr>
        @endforeach
    </tbody>

</table>
                    Sum Price: {{format($total)}}

                </div>
            </div><!-- end card-->
        </div>

    </div>



@endsection
