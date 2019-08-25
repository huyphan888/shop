@extends('frontend.layout.master')
@section('content')
    {{--@dd($errors->all())--}}

    <div id="single-product">
        <div class="container">
            <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
                <div class="product-item-holder size-big single-product-gallery small-gallery">
                    <div id="owl-single-product">
                        @forelse($product->attachments as $item)
                        <div class="single-product-gallery-item" id="slide{{$loop->index}}">

                            <a data-rel="prettyphoto" href="{{asset($item->path)}}">
                                <img src="{{asset($item->path)}}" alt="" width="468" height="468">

                            </a>
                        </div><!-- /.single-product-gallery-item -->
                        @empty
                        <img src="https://via.placeholder.com/468x468" alt="">
                        <img src="https://via.placeholder.com/468x468" alt="">
                        <img src="https://via.placeholder.com/468x468" alt="">
                        <img src="https://via.placeholder.com/468x468" alt="">
                        <img src="https://via.placeholder.com/468x468" alt="">
                        <img src="https://via.placeholder.com/468x468" alt="">
                        <img src="https://via.placeholder.com/468x468" alt="">
                        @endforelse

                    </div><!-- /.single-product-slider -->

                    <div class="single-product-gallery-thumbs gallery-thumbs">

                        <div id="owl-single-product-thumbnails">
                            @forelse($product->attachments as $item)
                            <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{$loop->index}}" href="#slide{{$loop->index}}">
                                <img src="{{asset($item->path)}}" alt="" width="67" height="67">

                            </a>
                                @empty
                                    <img src="https://via.placeholder.com/67x67" alt="">
                                    <img src="https://via.placeholder.com/67x67" alt="">
                                    <img src="https://via.placeholder.com/67x67" alt="">
                                    <img src="https://via.placeholder.com/67x67" alt="">
                                    <img src="https://via.placeholder.com/67x67" alt="">
                                    <img src="https://via.placeholder.com/67x67" alt="">
                                    <img src="https://via.placeholder.com/67x67" alt="">
                                @endforelse

                        </div><!-- /#owl-single-product-thumbnails -->

                        <div class="nav-holder left hidden-xs">
                            <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails" href="#prev"></a>
                        </div><!-- /.nav-holder -->

                        <div class="nav-holder right hidden-xs">
                            <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails" href="#next"></a>
                        </div><!-- /.nav-holder -->

                    </div><!-- /.gallery-thumbs -->

                </div><!-- /.single-product-gallery -->
            </div><!-- /.gallery-holder -->

            <div class="no-margin col-xs-12 col-sm-7 body-holder">
                <div class="body">
                    <div class="star-holder inline"><div class="star" data-score="{{ceil($product->comments()->avg('rating'))}}"></div></div>
                    <div class="availability"><label>Availability:</label><span class="available">
                            {{$product->quantity>0?'in stock ':'out of stock'}}

                        </span></div>

                    <div class="title"><a href="javascript:void()">{{$product->name}}</a></div>
                    <div class="brand">sony</div>

                    <div class="social-row">
                        <span class="st_facebook_hcount"></span>
                        <span class="st_twitter_hcount"></span>
                        <span class="st_pinterest_hcount"></span>
                    </div>

                    <div class="prices">
                        <div class="price-current">{{format($product->sale_price)}}</div>
                        <div class="price-prev">{{format($product->original_price)}}</div>
                    </div>

                    <div class="qnt-holder">
                        <div class="le-quantity">
                            <form>
                                <a class="minus" href="#reduce" @click.prevent="decrease({{$product->id}})"></a>
                                <input  type="text" v-model="quantity" @change="updateCart({{$product->id}})"/>
                                <a class="plus" href="#add" @click.prevent="increase({{$product->id}})"></a>
                            </form>
                        </div>
                        <a id="addto-cart" href="cart.html" class="le-button huge" @click.prevent="addToCart({{$product->id}})">@lang('home.Add To Cart')</a>
                    </div><!-- /.qnt-holder -->
                </div><!-- /.body -->

            </div><!-- /.body-holder -->
        </div><!-- /.container -->
    </div><!-- /.single-product -->

    <!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
    <section id="single-product-tab">
        <div class="container">
            <div class="tab-holder">

                <ul class="nav nav-tabs simple" >
                    <li class="active"><a href="#description" data-toggle="tab">@lang('home.Description')</a></li>
                    <li class="comment"><a href="#reviews" data-toggle="tab">@lang('home.Review') ({{$product->comments()->count()}})</a></li>
                    <li><a href="#additional-info" data-toggle="tab">@lang('home.Additional Information')</a></li>
                </ul><!-- /.nav-tabs -->

                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        {!! $product->content !!}
                        <div class="meta-row">
                            <div class="inline">
                                <label>Code:</label>
                                <span>{{$product->code}}</span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>categories:</label>
                                <span><a href="#">{{$product->cate->name}}</a></span>

                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>tag:</label>
                                @foreach($product->tags as $tag)
                                    <span><a href="#">{{$tag->name}}</a>
                                    @if(!$loop->last)
                                            ,
                                    @endif
                                </span>
                                @endforeach
                            </div><!-- /.inline -->
                        </div><!-- /.meta-row -->

                    </div><!-- /.tab-pane #description -->

                    <div class="tab-pane" id="additional-info">
                        <h3>Technology</h3><br><br>
                        @if(!empty($product->attributes))
                        <ul class="tabled-data">
                            <?php $attributes=json_decode($product->attributes) ?>
                            @foreach($attributes as $attribute)
                            <li>
                                <label>{{$attribute->name}}</label>
                                <div class="value">{{$attribute->value}}</div>
                            </li>
                            @endforeach

                        </ul><!-- /.tabled-data -->
                        @endif

                        <div class="meta-row">
                            <div class="inline">
                                <label>Code:</label>
                                <span>{{$product->code}}</span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>categories:</label>
                                <span><a href="#">{{$product->cate->name}}</a></span>

                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>tag:</label>
                                @foreach($product->tags as $tag)
                                <span><a href="#">{{$tag->name}}</a>
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                </span>
                                @endforeach
                            </div><!-- /.inline -->
                        </div><!-- /.meta-row -->
                    </div><!-- /.tab-pane #additional-info -->


                    <div class="tab-pane" id="reviews">
                        <div class="comments">

                            @forelse($comments as $comment)
                            <div class="comment-item" >
                                <div class="row no-margin">
                                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                        <div class="avatar">
                                         <img alt="avatar" src="{{ asset($comment->photo) }}">
                                        </div><!-- /.avatar -->
                                    </div><!-- /.col -->

                                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                        <div class="comment-body">
                                            <div class="meta-info">
                                                <div class="author inline">
                                                    <a href="#" class="bold">{{$comment->name}}</a>
                                                </div>
                                                <div class="star-holder inline">
                                                    <div class="star" data-score="{{$comment->rating}}"></div>
                                                </div>
                                                <div class="date inline pull-right">
                                                    {{showTimeAgo($comment->created_at)}}

                                                </div>
                                            </div><!-- /.meta-info -->
                                            <p class="comment-text">
                                                {{$comment->content}}

                                            </p><!-- /.comment-text -->
                                        </div><!-- /.comment-body -->

                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </div><!-- /.comment-item -->
                                <div class="comment-item" style="margin-left: 100px;">

                                    <div class="row no-margin">
                                        @foreach($comment->replies as $reply)
                                            <div>

                                            <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                            <div class="avatar">
                                                <img alt="avatar" src="{{asset($reply->photo)}}" height="100" width="100">
                                            </div><!-- /.avatar -->

                                        </div><!-- /.col -->

                                        <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                            <div class="comment-body">
                                                <div class="meta-info">
                                                    <div class="author inline">
                                                        <a href="#" class="bold">{{$reply->name}}</a>
                                                    </div>
                                                    <div class="date inline pull-right">
                                                        {{showTimeAgo($reply->created_at)}}
                                                    </div>

                                                    <div class="date inline pull-right">

                                                    </div>
                                                </div><!-- /.meta-info -->
                                                <p class="comment-text">
                                                    {{$reply->content}}
                                                </p><!-- /.comment-text -->
                                            </div><!-- /.comment-body -->

                                        </div><!-- /.col -->
                                            </div>
                                        @endforeach
                                        <form id="contact-form" class="contact-form" method="post" action="{{route('replies.update',$comment->id)}}">
                                            @csrf
                                            @method('put')
                                            <div class="field-row">
                                                <label>your reply</label>
                                                <textarea rows="5" class="le-input" name="content">{{old('content')}}</textarea>
                                                <span class="text-danger">{{$errors->first('content')}}</span>

                                            </div><!-- /.field-row -->

                                            <div class="buttons-holder" style="margin-bottom: 15px">
                                                @if(Auth::check())
                                                <button type="submit" class="le-button" id="">Reply</button>
                                                @endif
                                            </div><!-- /.buttons-holder -->
                                        </form><!-- /.contact-form -->


                                    </div><!-- /.row -->
                                </div><!-- /.comment-item -->

                            @empty
                            <p>chua co binh luan nao</p>
                            @endforelse



                        </div><!-- /.comments -->

                        <div class="add-review row">
                            <div class="col-sm-8 col-xs-12">
                                <div class="new-review-form" id="add-review">
                                    <a class="btn btn-danger" id="faq">Reply</a>

                                @if(session('success'))
                                        <div class="alert alert-success alert-dismissible show" role="alert">
                                            {{session('success')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if(Auth::check())

                                    <form id="contact-form" class="contact-form" method="post" action="">
                                        @csrf
                                        <div class="field-row star-row">
                                            <label>your rating</label>
                                            <div class="star-holder">
                                                <div class="star big"
                                                     data-score="{{old('score',0)}}"></div>
                                            </div>
                                            <span class="text-danger">{{$errors->first('score')}}</span>

                                        </div><!-- /.field-row -->

                                        <div class="field-row">
                                            <label>your review</label>
                                            <textarea rows="8" class="le-input" name="content">{{old('content')}}</textarea>
                                            <span class="text-danger">{{$errors->first('content')}}</span>

                                        </div><!-- /.field-row -->

                                        <div class="buttons-holder">
                                            <button type="submit" class="le-button huge">submit</button>
                                        </div><!-- /.buttons-holder -->
                                    </form><!-- /.contact-form -->
                                    @endif
                                </div><!-- /.new-review-form -->
                            </div><!-- /.col -->
                        </div><!-- /.add-review -->

                    </div><!-- /.tab-pane #reviews -->
                </div><!-- /.tab-content -->

            </div><!-- /.tab-holder -->
        </div><!-- /.container -->
    </section><!-- /#single-product-tab -->

    <section id="recently-reviewd" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder hover">
                @if(!empty($recent_products))

                    <div class="title-nav">
                        <h2 class="h1">@lang('home.Recentyle View')</h2>
                        <div class="nav-holder">
                            <a href="#prev" data-target="#owl-recently-viewed"
                               class="slider-prev btn-prev fa fa-angle-left"></a>
                            <a href="#next" data-target="#owl-recently-viewed"
                               class="slider-next btn-next fa fa-angle-right"></a>
                        </div>
                    </div><!-- /.title-nav -->
                    <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                        @foreach($recent_products as $recent_product)
                            <div class="no-margin carousel-item product-item-holder size-small hover">
                                <div class="product-item">
                                    <div class="ribbon red"><span>Recently view</span></div>
                                    <div class="image">
                                        <a href="{{ route('frontend.detail', [$recent_product->cate->slug,str_slug($recent_product->name),$recent_product->id]) }}">
                                            {!!thumbnail($recent_product->image,150,100)!!}
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="title">
                                            <a href="{{ route('frontend.detail', [$recent_product->cate->slug,str_slug($recent_product->name),$recent_product->id]) }}">{{$recent_product->name}}</a>
                                        </div>
                                        <div class="brand">Sharp</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-current text-right">{{format($recent_product->sale_price)}}</div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="single-product.html"  @click.prevent="addToCart({{$product->id}})" class="le-button">Add to Cart</a>
                                        </div>

                                    </div>
                                </div><!-- /.product-item -->
                            </div><!-- /.product-item-holder -->
                        @endforeach
                        @endif

                    </div><!-- /#recently-carousel -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#recently-reviewd -->

@stop
@section('body_scripts')
{{--    @dd($errors->all())--}}
    @if(!empty($errors->all() || session('success')))
        <script>
            $('ul.simple li').removeClass('active');
            $("li.comment").addClass('active');
            $(".tab-pane").removeClass('active');
            $("#reviews").addClass('active');
        </script>
    @endif
<script>

    $("#contact-form").hide();

    $(document).on('click', '#faq', function() {
        $("#contact-form").fadeToggle('200');

    });

</script>

@stop
