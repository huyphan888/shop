<?php /** @var \Illuminate\Support\ViewErrorBag $errors*/?>
@extends('admin.template.master')
@section('header')
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
@stop
@section('content')

    <div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-header" style="padding-bottom: 0px;">
                <h3 class="pull-left"><i class="fa fa-edit" ></i> Edit product {{$product->name}}</h3>
                <p class="pull-right">
                    <a target="_blank" href="{{route('frontend.detail',[$product->cate->slug,str_slug($product->name),$product->id])}}" class="btn btn-outline-dark">
                        <i class="fa fa-link"></i>
                        View this post
                    </a>
                </p>
            </div>

            <div class="card-body">

                <form  action="{{route('products.update',$product->id)}}" method="post"  enctype="multipart/form-data" id="app">
                        @csrf
                        @method('put')
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="cate_id" class="form-control {{$errors->has('cate_id')?'is-invalid':''}}">
                            <option value="">Please choose Category</option>
                            {!!getCategories($cates,old('cate_id',$product->cate_id))!!}
                        </select>
                        <div class="invalid-feedback">
                            {{$errors->first('cate_id')}}
                        </div>
                    </div>
                        {!! input('name',$product->name) !!}

                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="input-group">
                        <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                          <i class="fa fa-picture-o"></i> Choose
                        </a>
                      </span>
                            <input id="thumbnail" class="form-control" type="text" name="filepath" value="">
                        </div>
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$product->image?asset($product->image):''}}">


                        {!! input('original_price',$product->original_price) !!}
                        {!! input('sale_price',$product->sale_price) !!}
                        {!! input('code',$product->code) !!}
                        {!! input('quantity',$product->quantity) !!}
                        {!! textarea('content',$product->content) !!}



                        <div class="form-group">
                            <label>Tag</label>
                            <select class="form-control" multiple="multiple" name="tags[]" id="tag">
                                    @if(old('tags',$tags))
                                    @foreach(old('tags',$tags) as $tag)
                                    <option value="{{$tag->name}}" selected>{{$tag->name}}</option>
                                    @endforeach
                                    @endif
                            </select>


                        </div>

                        <div class="form-group">
                            <label>Image Library</label>
                            <div class="row" >
                                <div>
                                @foreach($product->attachments as $item)
                                        <img src="{{asset($item->path)}}" alt="" width="100">
                                @endforeach
                                </div>
                                <div class="col-md-12 mt-3">
                                    <input type="file" class="form-control" name="images[]" multiple>
                                </div>

                            </div>

                            <div class="invalid-feedback">
                                {{$errors->first('images.*')}}
                            </div>

                        </div>

                        {{--end form section--}}
                        <div class="form-group" >
                            <label for="">Attributes</label>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>thuoc tinh</th>
                                        <th>gia tri</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item,index in attributes">
                                    <td><input class='form-control' type="text" :name="'attributes['+index+'][name]'" v-model="item.name" placeholder="thuoc tinh"></td>
                                    <td><input class='form-control' type="text" :name="'attributes['+index+'][value]'" v-model="item.value" placeholder="gia tri"></td>
                                    <td><button class="btn btn-danger" @click.prevent="remove(index)" v-if="attributes.length>1 && index>=0"><i class="fa fa-minus-circle"></i></button>
                                        <button class="btn btn-success" @click.prevent="plus" v-if="index==attributes.length-1"><i class="fa fa-plus-circle"></i></button>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>

                    {!! submit('primary') !!}

                </form>
            </div>
        </div><!-- end card-->
    </div>

</div>

@endsection
@section('footer')
<script src="{{asset('assets/js/vue.min.js')}}"></script>
<script>
    @if(!empty($product->attributes))
    attr={!!$product->attributes!!};
    @else
    attr=[{name: '', value: ''}];
    @endif

    new Vue({
        el: '#app',
        data:{
            image:'{{$product->image?asset($product->image):null}}',
            attributes:attr
        },
        methods: {
            onFileChange(e) {
                let file = e.target.files[0];
                this.image = URL.createObjectURL(file);
            },
            plus(){
                this.attributes.push({name: '', value: ''});
            },
            remove(index){
                this.attributes.splice(index,1);
            }
        }
    });
</script>
<script src="{{asset('assets/js/select2.min.js')}}"></script>
@include('includes.tynimce')
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@stop
