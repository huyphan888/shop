@extends('frontend.layout.master')
@section('content')
    <section id="cart-page">
        <div class="container">
            <form action="" method="post">

            <!-- ========================================= CONTENT ========================================= -->
            <div class="col-xs-12 col-md-9 items-holder no-margin">
                <div class="row no-margin cart-item" v-for="item,index in cart">
                    <div class="col-xs-12 col-sm-1 no-margin" >
                        <a :href="item.url" class="thumb-holder">
                            <img class="lazy" alt="" :src="item.image" width="100"/>
                        </a>
                    </div>

                    <div class="col-xs-12 col-sm-6 ">
                        <div class="title">
                            <a :href="item.url">@{{ item.name }}</a>
                            - Price: @{{ item.price }}
                        </div>
                        <div class="brand">Code: @{{ item.code }}</div>
                    </div>

                    <div class="col-xs-12 col-sm-3 no-margin">
                        <div class="quantity">
                            <div class="le-quantity">
                                <a class="minus" href="#reduce" @click.prevent="decrease(index)"></a>
                                <input  type="text" v-model="item.quantity" @change="updateCart(index)"/>
                                <a class="plus" href="#add" @click.prevent="increase(index)"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-2 margin">
                        <div class="price">
                            @{{ item.sum }}
                        </div>
                        <a class="close-btn" href="#" @click.prevent="deletes(index)"></a>
                    </div>
                </div><!-- /.cart-item -->


                <div style="margin-top: 10px;">
                    <a type="submit" class="btn btn-warning pull-right" href="{{route('frontend.cart.deleteAll')}}">Delete all</a>


                </div>

            </div>
            <!-- ========================================= CONTENT : END ========================================= --></form>
        </form>
            <!-- ========================================= SIDEBAR ========================================= -->

            <div class="col-xs-12 col-md-3 no-margin sidebar ">
                <div class="widget cart-summary">
                    <h1 class="border">shopping cart</h1>
                    <div class="body">
                        <ul class="tabled-data no-border inverse-bold">
                            <li>
                                <label>cart subtotal</label>
                                <div class="value pull-right">@{{sumPrice}}</div>
                            </li>
                            <li>
                                <label>shipping</label>
                                <div class="value pull-right">free shipping</div>
                            </li>
                        </ul>
                        <ul id="total-price" class="tabled-data inverse-bold no-border">
                            <li>
                                <label>order total</label>
                                <div class="value pull-right">@{{sumPrice}}</div>
                            </li>
                        </ul>
                        <div class="buttons-holder">
                            <a class="le-button big" href="{{route('frontend.checkout')}}" >checkout</a>
                            <a class="simple-link block" href="{{url('')}}" >continue shopping</a>
                        </div>
                    </div>
                </div><!-- /.widget -->


            </div><!-- /.sidebar -->

            <!-- ========================================= SIDEBAR : END ========================================= -->
        </div>
    </section>
@stop
