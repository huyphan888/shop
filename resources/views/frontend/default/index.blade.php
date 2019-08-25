@extends('frontend.layout.master')
@section('content')
    <div id="top-banner-and-menu">
        <div class="container">

            <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown">
                    <div class="head"><i class="fa fa-list"></i> {{__('home.All Departments')}}</div>
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav">
                            @foreach($cates as $cate)
                            <li class="dropdown menu-item">
                                <a href="{{route('frontend.cate',$cate->slug)}}" class="dropdown-toggle" data-hover="dropdown">{{$cate->name}}</a>
                                @if(count($cate->children)>0)
                                <ul class="dropdown-menu mega-menu">
                                    <li class="yamm-content">
                                        <ul class="list-unstyled">
                                            @foreach($cate->children as $children)
                                                <li><a href="{{$children->slug}}.html">{{$children->name}}</a></li>
                                            @endforeach
                                         </ul>
                                    </li>
                                </ul>
                                @endif
                    </li><!-- /.menu-item -->
                    @endforeach

                        </ul><!-- /.nav -->
                    </nav><!-- /.megamenu-horizontal -->
                </div><!-- /.side-menu -->

                <!-- ================================== TOP NAVIGATION : END ================================== -->
            </div><!-- /.sidemenu-holder -->

            <div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                        <div class="item"
                             style="background-image: url({{ asset('themes/default/assets/images/Apple_Store_LA.jpg') }});">
                            <div class="container-fluid">
                                <div class="caption vertical-center text-left">
                                    <div class="big-text fadeInDown-1">
                                        Save up to a<span class="big"><span class="sign">$</span>400</span>
                                    </div>

                                    <div class="excerpt fadeInDown-2 text-white">
                                        on selected laptops<br>
                                        & desktop pcs or<br>
                                        smartphones
                                    </div>
                                    <div class="small fadeInDown-2">
                                        terms and conditions apply
                                    </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="" class="big le-button ">shop now</a>
                                    </div>
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->
                        <div class="item"
                             style="background-image: url({{ asset('themes/default/assets/images/maxresdefault.jpg') }});">
                            <div class="container-fluid">
                                <div class="caption vertical-center text-left">
                                    <div class="big-text fadeInDown-1">
                                        Save up to a<span class="big"><span class="sign">$</span>400</span>
                                    </div>

                                    <div class="excerpt fadeInDown-2 text-white">
                                        on selected laptops<br>
                                        & desktop pcs or<br>
                                        smartphones
                                    </div>
                                    <div class="small fadeInDown-2">
                                        terms and conditions apply
                                    </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="single-product.html" class="big le-button ">shop now</a>
                                    </div>
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->



                    </div><!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->
            </div><!-- /.homebanner-holder -->

        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->

    <!-- ========================================= HOME BANNERS ========================================= -->
    <section id="banner-holder" class="wow fadeInUp">
        <div class="container">
            <div class="col-xs-12 col-lg-6 no-margin banner">
                <a href="">
                    <div class="banner-text theblue">
                        <h1>New Life</h1>
                        <span class="tagline">Introducing New Category</span>
                    </div>
                    <img class="banner-image" alt="" src="{{ asset('themes/default/assets/images/blank.gif') }}"
                         data-echo="{{ asset('themes/default/assets/images/www/banner_on_top_img_1_b08141c5-ab56-4165-8e1e-d03112075cc0_630x350.png') }}"/>
                </a>
            </div>
            <div class="col-xs-12 col-lg-6 no-margin text-right banner">
                <a href="">
                    <div class="banner-text right">
                        <h1>Time &amp; Style</h1>
                        <span class="tagline">Checkout new arrivals</span>
                    </div>
                    <img class="banner-image" alt="" src="{{ asset('themes/default/assets/images/blank.gif') }}"
                         data-echo="{{ asset('themes/default/assets/images/www/banner_on_top_img_2_d8608871-dd77-4491-94a6-50b361222a34_630x350.png') }}"/>
                </a>
            </div>
        </div><!-- /.container -->
    </section><!-- /#banner-holder -->
    <!-- ========================================= HOME BANNERS : END ========================================= -->
@include('frontend.default.smartphone')
    <!-- ========================================= BEST SELLERS ========================================= -->

    <section id="recently-reviewd" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder hover">
                    @if(!empty($bestseller))

                <div class="title-nav">
                    <h2 class="h1">{{__('Bestseller')}}</h2>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-recently-viewed"
                           class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-recently-viewed"
                           class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->
                <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                    @foreach($bestseller as $recent_product)
                    <div class="no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">
                            <div class="ribbon red"><span>Hot</span></div>
                            <div class="image">
                                <a id="trending" href="{{ route('frontend.detail', [$recent_product->cate->slug,str_slug($recent_product->name),$recent_product->id]) }}">
                                    {!!thumbnail($recent_product->image,150,100)!!}


                                </a>
                            </div>
                            <div class="body">
                                <div class="title">
                                    <a  href="{{ route('frontend.detail', [$recent_product->cate->slug,str_slug($recent_product->name),$recent_product->id]) }}">{{$recent_product->name}}</a>
                                </div>
                                <div class="brand">Sharp</div>
                            </div>
                            <div class="prices">
                                <div class="price-current text-right">{{number_format($recent_product->original_price,0,',','.')}} VND</div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <a href="single-product.html" @click.prevent="addToCart({{$recent_product->id}})" class="le-button">Add to Cart</a>
                                </div>

                            </div>
                        </div><!-- /.products-item -->
                    </div><!-- /.products-item-holder -->
                    @endforeach
                    @endif

                </div><!-- /#recently-carousel -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#recently-reviewd -->

{{--    <section id="top-brands" class="wow fadeInUp">--}}
{{--        <div class="container">--}}
{{--            <div class="carousel-holder">--}}

{{--                <div class="title-nav">--}}
{{--                    <h1>{{__('Top Brands')}}</h1>--}}
{{--                    <div class="nav-holder">--}}
{{--                        <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>--}}
{{--                        <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>--}}
{{--                    </div>--}}
{{--                </div><!-- /.title-nav -->--}}

{{--                <div id="owl-brands" class="owl-carousel brands-carousel">--}}

{{--                    <div class="carousel-item">--}}
{{--                        <a href="#">--}}
{{--                            <img alt="" src="{{ asset('themes/default/assets/images/apple-vector-logo.jpg') }}"/>--}}
{{--                        </a>--}}
{{--                    </div><!-- /.carousel-item -->--}}
{{--                </div><!-- /.brands-caresoul -->--}}

{{--            </div><!-- /.carousel-holder -->--}}
{{--        </div><!-- /.container -->--}}
{{--    </section>--}}
    <!-- ========================================= TOP BRANDS : END ========================================= -->
@endsection


