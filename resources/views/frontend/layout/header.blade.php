<header>
    <div class="container no-padding">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <div class="logo">
                <a href="{{url('')}}">
                    <img src="{{asset('vendor/logo4.png')}}" alt="" height="100px">
                </a>
            </div>
        </div><!-- /.logo-holder -->

        <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">
            <div class="contact-row">
                <div class="phone inline">
                    <i class="fa fa-phone"></i> (+84) 85 888 1560

                </div>
                <div class="contact inline">
                    <i class="fa fa-envelope"></i> {{__('contact')}} Email: <span class="le-color">richestbabylon888@gmail.com</span>
                </div>
            </div>
            <div class="search-area">
                <form method="get" action="{{route('frontend.products')}}" id="form-search">
                    <div class="control-group">
                        <input class="search-field" required placeholder="Search for item" name="search" value="{{request('search')}}"/>



                        <a class="search-button" href="#" onclick="event.preventDefault();document.getElementById('form-search').submit()"></a>


                    </div>
                </form>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 top-cart-row no-margin">
            <div class="top-cart-row-container">
                <div class="top-cart-holder dropdown animate-dropdown">
                    <div class="basket">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <div class="basket-item-count">
                                <span class="count">@{{total}}</span>
                                <img src="{{ asset('themes/default/assets/images/icon-cart.png') }}" alt=""/>
                            </div>

                            <div class="total-price-basket">
                                <span class="lbl">{{__('Your Cart')}}:</span>
                                <span class="total-price">
                        <span class="sign"></span><span class="value">@{{sumPrice}}</span>
                    </span>
                            </div>
                        </a>

                        <ul class="dropdown-menu">
                            <li v-for="item in cart">
                                <div class="basket-item">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4  text-center">
                                            <div class="thumb">
                                                <a :href="item.url"><img :src="item.image"/></a>
                                            </div>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 no-margin">
                                            <div class="title"><a :href="item.url">@{{item.name}} x @{{item.quantity}}</a></div>
                                            <div class="price">@{{item.sum}}</div>
                                        </div>
                                    </div>
                                    <a class="close-btn" href="#" @click.prevent="deletes(index)"></a>
                                </div>
                            </li>


                            <li class="checkout"  v-if="total>0">
                                <div class="basket-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <a href="{{route('frontend.cart.index')}}" class="le-button"
                                            >View cart</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-6" >
                                            <a href="{{route('frontend.checkout')}}" class="le-button">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li v-else><div class="basket-item">
                                {{'you don\'t have any product in basket'}}
                                </div>
                            </li>

                        </ul>
                    </div><!-- /.basket -->
                </div><!-- /.top-cart-holder -->
            </div><!-- /.top-cart-row-container -->

        </div><!-- /.top-cart-row -->
    </div><!-- /.container -->
    @if (Route::currentRouteName() !== 'frontend.home')
        <nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
            <div class="container">
                <div class="yamm navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#mc-horizontal-menu-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div><!-- /.navbar-header -->
                    <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                        <ul class="nav navbar-nav">
                            @foreach($cates as $cate)

                                <li class="dropdown">
                                    <a href="{{route('frontend.cate',$cate->slug)}}" class="dropdown-toggle" data-hover="dropdown" >{{$cate->name}}</a>
                                    @if(count($cate->children)>0)
                                        <ul class="dropdown-menu">
                                            @foreach($cate->children as $children)
                                                <li><a href="{{route('frontend.cate',$children->slug)}}">{{$children->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach


                        </ul><!-- /.navbar-nav -->
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.navbar -->
            </div><!-- /.container -->
        </nav>
        @if (Route::currentRouteName() == 'frontend.detail')
        <div class="animate-dropdown">
            <div id="breadcrumb-alt">
                <div class="container">
                    <div class="breadcrumb-nav-holder minimal">
                        <ul>
                            @if($product->cate->ancestors!='[]')
                            <li class="dropdown breadcrumb-item">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    {{$product->cate->ancestors[0]->name}}
                                </a>
                                @if($descen=$product->cate->ancestors[0]->descendants)
                                <ul class="dropdown-menu">
                                    @foreach($descen as $child)
                                     <li><a href="#">{{$child->name}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li><!-- /.breadcrumb-item -->
                            @else
                                <li class="dropdown breadcrumb-item">
                                    <a href="{{url('')}}" class="dropdown-toggle" data-toggle="dropdown">
                                        Home
                                    </a>

                                </li><!-- /.breadcrumb-item -->
                            @endif

                            <li class="breadcrumb-item">
                                <a href="#">{{$product->cate->name}}</a>
                            </li><!-- /.breadcrumb-item -->

                            <li class="breadcrumb-item current">
                                <a href="javascript:void()">{{$product->name}}</a>
                            </li><!-- /.breadcrumb-item -->
                        </ul><!-- /.breadcrumb-nav-holder -->
                    </div>
                </div><!-- /.container -->
            </div>

        </div>
        @endif
     @endif

</header>
