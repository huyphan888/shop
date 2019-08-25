<?php /** @var \Illuminate\Support\ViewErrorBag $errors*/?>
<?php /** @var \App\cate $cate*/?>
@extends('admin.template.master')
@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-edit" style="color: #1f6fb2"></i> Edit cate</h3>
                </div>

                <div class="card-body">


                    <form class="demo-form" action="{{route('cates.update',$cate->id)}}" method="post">
                        @csrf
                        @method('put')
                        {!! input('name',$cate->name) !!}
                        {!! input('order',$cate->order) !!}

                        <div class="form-section">
                            <label>parent_id</label>
                            <select name="parent_id" class="form-control" data-container="body">
                                <option value="0">Root</option>
                                {!!getCategories($cates,$cate->parent_id)!!}
                            </select>
                            <div class="invalid-feedback">
                                {{$errors->first('parent_id')}}
                            </div>

                        </div>
                            {!! submit() !!}

                    </form>


                </div>
            </div><!-- end card-->
        </div>

    </div>



@endsection
