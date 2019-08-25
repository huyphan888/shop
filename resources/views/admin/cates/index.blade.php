<?php /** @var \App\cate $cate */ ?>
@extends('admin.template.master')
@section('content')
    <div class="row">

        <div class="col-4">
            <h4 style="margin-bottom: 25px;">Add new category</h4>

            <form class="demo-form" action="{{route('cates.store')}}" method="post">
                @csrf
               {!! input('name') !!}
               {!! input('order') !!}


                <div class="form-group">


                    <label>parent_id</label>
                    <select name="parent_id" class="form-control">
                        <option value="" >Choose your option</option>
                        <option value="0">Root</option>
                        {!!getCategories($catesTree,old('parent_id'))!!}
                    </select>
                    <div class="invalid-feedback">
                        {{$errors->first('parent_id')}}
                    </div>

                </div>
                {!! submit() !!}

            </form>

        </div>
        <div class="col-8 pull-right">
            <div class="card mb-3">

                <div class="card-header">


                    <h3><i class="fa fa-cate"></i> All cates (4 cates)</h3>
                </div>
                <!-- end card-header -->

                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th style="width:50px">STT</th>
                                <th  style="width:150px">Cate details</th>
                                <th  style="width:50px">Order</th>

                                <th style="width:150px">Number Product</th>
                                <th style="width:120px">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0; ?>
                            @forelse($cates as $cate)
                                @if($cate->depth==0)
                                    <tr><td colspan="5"></td></tr>
                                @endif
                                <tr>
                                    <td>
                                        @if($cate->depth==0)
                                            <?php $stt++; ?>
                                                {{$stt}}

                                        @endif

                                    </td>

                                    <td>
                                        <a href="{{route('cates.edit',$cate->id)}}">
                                        @if($cate->depth>0)
                                            {{str_repeat('- - ',$cate->depth).$cate->name}}
                                        @else
                                            <font color="#ff4500" style="font-weight: bold">{{$cate->name}}</font>
                                        @endif
                                        </a>
                                    </td>
                                    <td><input type="text" name="order" value="{{$cate->order}}"></td>
                                    @php
                                        $categories = $cate->descendants()->pluck('id');
                                        $categories[] = $cate->id;
                                        $goods = \App\Product::whereIn('cate_id', $categories)->count();
                                    @endphp

                                    <td>{{$goods}}</td>

                                    <td>
                                        <form action="{{route('cates.destroy',$cate->id)}}" method="post"
                                              id="form{{$cate->id}}">
                                            @csrf
                                            @method('delete')

                                        </form>


                                        <a href="javascript:void()" class="btn btn-danger btn-sm" onclick="return confirm('ban co chac khong?')?document.getElementById('form{{$cate->id}}').submit():''">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5">No data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{--{{$cates->links()}}--}}
                    </div>


                </div>
                <!-- end card-body -->

            </div>
            <!-- end card -->

        </div>
        <!-- end col -->

    </div>

@endsection
