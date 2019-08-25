<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#latest-products" data-toggle="tab">Smartphone</a></li>
                <li><a href="#featured" data-toggle="tab">Laptop</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="latest-products">
                    <div class="product-grid-holder">
                        @forelse($products as $product)
                            <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                                <div class="product-item">
                                    {{--<div class="ribbon red"><span>sale</span></div>--}}
                                    <div class="ribbon red"><span>new</span></div>
                                    <div class="image">
                                    <a href="{{ route('frontend.detail', [$product->cate->slug,str_slug($product->name),$product->id]) }}">
                                        {!!thumbnail($product->image,200,200)!!}
                                    </a>
                                    </div>
                                    <div class="body">
                                        {{--<div class="label-discount green">-50% sale</div>--}}
                                        <div class="title">
                                            <a href="{{ route('frontend.detail', [$product->cate->slug,str_slug($product->name),$product->id]) }}">{{ $product->name }}</a>
                                        </div>
                                        <div class="brand">{{ $product->code }}</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev"><s>{{format($product->original_price) }}</s></div>
                                        <div class="price-current pull-right">{{format($product->sale_price) }}</div>
                                    </div>

                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="" @click.prevent="addToCart({{$product->id}})" class="le-button">Thêm giỏ hàng</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>chua co san pham nao</p>
                        @endforelse
                    </div>



                </div>
                <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                           
                            </a>
                    </div>
                <div class="tab-pane" id="featured">
                    <div class="product-grid-holder">
                        @forelse($products2 as $product)
                            <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                                <div class="product-item">
                                    {{--<div class="ribbon red"><span>sale</span></div>--}}
                                    <div class="ribbon blue"><span>new</span></div>
                                    {{--<div class="ribbon blue"><span>new</span></div>--}}

                                    <div class="image">

                                        <a href="{{ route('frontend.detail', [$product->cate->slug,str_slug($product->name),$product->id]) }}">
                                            {!!thumbnail($product->image,246,146)!!}
                                        </a>

                                    </div>
                                    <div class="body">
                                        {{--<div class="label-discount green">-50% sale</div>--}}
                                        <div class="title">
                                            <a href="{{ route('frontend.detail', [$product->cate->slug,str_slug($product->name),$product->id]) }}">{{ $product->name }}</a>
                                        </div>
                                        <div class="brand">{{ $product->code }}</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev"><s>{{format($product->original_price) }}</s></div>
                                        <div class="price-current pull-right">{{format($product->sale_price) }}</div>
                                    </div>

                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="" class="le-button" @click.prevent="addToCart({{$product->id}})">Thêm giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>chua co san pham nao</p>
                        @endforelse
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
