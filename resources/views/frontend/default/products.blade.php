@extends('frontend.layout.master')
@section('content')
 <section id="category-grid">
        <div class="container">

            <!-- ========================================= SIDEBAR ========================================= -->
            <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">

                <!-- ========================================= PRODUCT FILTER ========================================= -->

                <!-- ========================================= CATEGORY TREE ========================================= -->
                <div class="widget accordion-widget category-accordions">
                    <h1 class="border">Category Tree</h1>
                    <div class="accordion">
                        <div class="accordion-group">
                            @foreach($cates as $cate1)
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" href="#collapse{{$loop->index}}">
                                    {{$cate1->name}}
                                </a>
                            </div>
                            <div id="collapse{{$loop->index}}" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    <ul>
                                        @foreach($cate1->children as $child1)
                                        <li>
                                            <div class="accordion-heading">
                                                <a href="{{route('frontend.cate',$child1->slug)}}">{{$child1->name}}</a>
                                            </div>
                                            <div id="collapseSub2" class="accordion-body collapse in">
                                                <ul>
                                                    @foreach($child1->children as $child2)
                                                    <li>
                                                        <div class="accordion-heading">
                                                            <a href="#collapseSub3" data-toggle="collapse">{{$child2->name}}</a>
                                                        </div>
                                                        <div id="collapseSub3" class="accordion-body collapse in">
                                                            <ul>
                                                                @foreach($child2->children as $child3)
                                                                    <li><a href="#">{{$child3->name}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div><!-- /.accordion-body -->
                                                    </li>
                                                        @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                            @endforeach

                                    </ul>
                                </div><!-- /.accordion-inner -->
                            </div>
                            @endforeach
                        </div><!-- /.accordion-group -->



                    </div><!-- /.accordion -->
                </div><!-- /.category-accordions -->

                <!-- ========================================= LINKS : END ========================================= -->
                <div class="widget">
                    <div class="simple-banner">
                        <a href="#"><img alt="" class="img-responsive" src="{{asset('vendor/satisfied.jpg')}}" data-echo="{{asset('vendor/satisfied.jpg')}}" /></a>
                    </div>
                </div>
                <!-- ========================================= FEATURED PRODUCTS ========================================= -->
                <div class="widget">
                    <h1 class="border">Featured Products</h1>
                    <ul class="product-list">
                    @foreach($featured as $product)
                        <li class="sidebar-product-list-item">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin">
                                    <a href="{{ route('frontend.detail', [$product->cate->slug,str_slug($product->name),$product->id]) }}" class="thumb-holder">
                                        {!!thumbnail($product->image,73,73)!!}
                                    </a>
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <a href="{{ route('frontend.detail', [$product->cate->slug,str_slug($product->name),$product->id]) }}">{{$product->name}}</a>
                                    <div class="price">
                                        <div class="price-prev">{{format($product->original_price)}}</div>
                                        <div class="price-current">{{format($product->sale_price)}}</div>
                                    </div>
                                </div>
                            </div>
                        </li><!-- /.sidebar-product-list-item -->
                        @endforeach



                    </ul><!-- /.product-list -->
                </div><!-- /.widget -->
                <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
            </div>
            <!-- ========================================= SIDEBAR : END ========================================= -->

            <!-- ========================================= CONTENT ========================================= -->

            <div class="col-xs-12 col-sm-9 no-margin wide sidebar">


                <section id="gaming">
                    <div class="grid-list-products">
                        <h2 class="section-title">{!! request('search')?'Result Search: <font color=red>'.request('search').'</font>':$cate->name!!}</h2>

                       

                        <div class="tab-content">
                            <div id="grid-view" class="products-grid fade tab-pane in active">

                                <div class="product-grid-holder">
                                    <div class="row no-margin">
                                        @forelse($products as $product)
                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="ribbon red"><span>sale</span></div>
                                                <div class="image">

                                                    <a href="{{ route('frontend.detail', [$product->cate->slug,str_slug($product->name),$product->id]) }}">
                                                        {!!thumbnail($product->image)!!}
                                                    </a>
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount green">
                                                        {{ceil(($product->original_price-$product->sale_price)*100/$product->original_price)}}% sale</div>
                                                    <div class="title">
                                                        <a href="{{ route('frontend.detail', [$product->cate->slug,str_slug($product->name),$product->id]) }}">{{$product->name}}</a>
                                                    </div>
                                                    <div class="brand">{{$product->code}}</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev"><s>{{format($product->original_price)}}</s></div>
                                                    <div class="price-current pull-right">{{format($product->sale_price)}}</div>
                                                </div>
                                                <div class="hover-area">
                                                    <div class="add-cart-button">
                                                        <a href="single-product.html" class="le-button" @click.prevent="addToCart({{$product->id}})">add to cart</a>
                                                    </div>

                                                </div>
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->
                                        @empty
                                        chua co san pham nao
                                        @endforelse

                                    </div><!-- /.row -->
                                </div><!-- /.product-grid-holder -->

                                <div class="pagination-holder mt-5">
                                    <div class="row">
                                        {{$products->appends(['order' => request('order'),'search' => request('search'),'cate_id' => request('cate_id')])->links('vendor.pagination.custom')}}

                                    </div><!-- /.row -->
                                </div><!-- /.pagination-holder -->
                            </div><!-- /.products-grid #grid-view -->

                            <div id="list-view" class="products-grid fade tab-pane ">
                                <div class="products-list">
                                    @forelse($products as $product)
                                    <div class="product-item product-item-holder">

                                        <div class="ribbon red"><span>sale</span></div>
                                        <div class="ribbon blue"><span>new!</span></div>
                                        <div class="row">
                                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                <div class="image">
                                                    <a href="{{ route('frontend.detail', [$product->cate->slug,str_slug($product->name),$product->id]) }}">
                                                        {!!thumbnail($product->image)!!}
                                                    </a>
                                                </div>
                                            </div><!-- /.image-holder -->
                                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                                <div class="body">
                                                    <div class="label-discount green">-50% sale</div>
                                                    <div class="title">
                                                        <a href="single-product.html">{{$product->title}}</a>
                                                    </div>
                                                    <div class="brand">{{$product->code}}</div>
                                                    <div class="excerpt">
                                                        <p>{!!substr($product->content,0,100)!!}</p>
                                                    </div>

                                                </div>
                                            </div><!-- /.body-holder -->
                                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                                <div class="right-clmn">
                                                    <div class="price-current">{{format($product->sale_price)}}</div>
                                                    <div class="price-prev"><s>{{format($product->original_price)}}</s></div>
                                                    <div class="availability"><label>availability:</label><span class="available">  in stock</span></div>
                                                    <a class="le-button" href="#" @click.prevent="addToCart({{$product->id}})">add to cart</a>
                                                </div>
                                            </div><!-- /.price-area -->
                                        </div><!-- /.row -->
                                    </div><!-- /.product-item -->
                                             @empty
                                    chua co san pham nao
                                        @endforelse

                                </div><!-- /.products-list -->

                                <div class="pagination-holder">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 text-left">
                                            {{--<ul class="pagination">
                                                <li class="current"><a  href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">next</a></li>
                                            </ul><!-- /.pagination -->--}}

                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="result-counter">
                                                Showing <span>1-9</span> of <span>11</span> results
                                            </div><!-- /.result-counter -->
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.pagination-holder -->

                            </div><!-- /.products-grid #list-view -->

                        </div><!-- /.tab-content -->
                    </div><!-- /.grid-list-products -->

                </section><!-- /#gaming -->
            </div><!-- /.col -->
            <!-- ========================================= CONTENT : END ========================================= -->
        </div><!-- /.container -->
    </section>
    @stop
