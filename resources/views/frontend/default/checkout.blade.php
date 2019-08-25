@extends('frontend.layout.master')
@section('styles')
    <style>
        .imaged img{
            max-width: 120px;
        }
    </style>

@stop
@section('content')
    <style>
        .imaged img{
            max-width: 100px !important;
        }
    </style>
    <section id="checkout-page">
        <div class="container">
            <div class="col-xs-12 no-margin">

                <div class="billing-address">
                    <h2 class="border h1">billing address</h2>
                    <form action="" method="post" id="billing">
                        @csrf
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>full name*</label>
                                <input class="le-input" name="name" value="{{old('name')}}">
                                <span class="text-danger">{{$errors->first('name')}}</span>

                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>address*</label>
                                <input class="le-input"  name="address"  value="{{old('address')}}">
                                <span class="text-danger">{{$errors->first('address')}}</span>

                            </div>

                        </div><!-- /.field-row -->



                        <div class="row field-row">

                            <div class="col-xs-12 col-sm-6">
                                <label>email address*</label>
                                <input class="le-input" name="email"  value="{{old('email')}}">
                                <span class="text-danger">{{$errors->first('email')}}</span>

                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>phone number*</label>
                                <input class="le-input" name="phone"  value="{{old('phone')}}">
                                <span class="text-danger">{{$errors->first('phone')}}</span>

                            </div>


                        </div><!-- /.field-row -->


                </div><!-- /.billing-address -->


                <section id="your-order">
                    <h2 class="border h1">your order</h2>
                    @forelse($products as $item)
                        <div class="row no-margin order-item">
                            <div class="col-xs-12 col-sm-1 no-margin">
                                <a href="#" class="qty">{{$item->quantity}}</a>
                            </div>

                            <div class="col-xs-12 col-sm-2 ">
                                <div class="title"><a href="{{ route('frontend.detail', [$item->cate->slug,str_slug($item->name),$item->id]) }}">{{$item->name}}</a></div>
                                <div class="brand">{{$item->code}}</div>
                            </div>
                            <div class="col-xs-12 col-sm-7 imaged">
                                <div class="title"><a href="{{ route('frontend.detail', [$item->cate->slug,str_slug($item->name),$item->id]) }}">
                                        {!!thumbnail($item->image)!!}
                                    </a></div>

                            </div>

                            <div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price">{!! format($item->subtotal) !!}</div>
                            </div>
                        </div><!-- /.orders-item -->
                    @empty
                    <h3>chua co san pham nao</h3>
                    @endforelse



                </section><!-- /#your-orders -->

                <div id="total-area" class="row no-margin">
                    <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                        <div id="subtotal-holder">
                            <ul class="tabled-data inverse-bold no-border">
                                <li>
                                    <label>cart subtotal</label>
                                    <div class="value ">{!! format($sum) !!}</div>
                                </li>
                                <li>
                                    <label>shipping</label>
                                    <div class="value">
                                        <div class="radio-group">
                                            free shipping
                                        </div>
                                    </div>
                                </li>
                            </ul><!-- /.tabled-data -->

                            <ul id="total-field" class="tabled-data inverse-bold ">
                                <li>
                                    <label>order total</label>
                                    <div class="value">{!! format($sum) !!}</div>
                                </li>
                            </ul><!-- /.tabled-data -->

                        </div><!-- /#subtotal-holder -->
                    </div><!-- /.col -->
                </div><!-- /#total-area -->



                <div class="place-order-button">
                    <input type="submit" class="le-button big" value="checkout" onclick="document.getElementById('billing').submit()">
                </div><!-- /.place-orders-button -->
</form>

            </div><!-- /.col -->
        </div><!-- /.container -->
    </section><!-- /#checkout-page -->
@stop
