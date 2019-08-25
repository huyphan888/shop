@switch(Route::currentRouteName())
    @case('user.index')
        @php $action='List user';$controller='User';@endphp
    @break
    @case('users')
         @php $action='Add user' ;$controller='User';@endphp
    @break
    @case('user.edit')
        @php $action='users';$controller='User';@endphp
    @break


    @case('cate.index')
    @php $action='List cate';$controller='Cate';@endphp
    @break
    @case('cate.create')
    @php $action='cates' ;$controller='Cate';@endphp
    @break
    @case('cate.edit')
    @php $action='Edit cate';$controller='Cate';@endphp
    @break


    @case('product.index')
    @php $action='List product';$controller='Product';@endphp
    @break
    @case('product.create')
    @php $action='Add product' ;$controller='Product';@endphp
    @break
    @case('product.edit')
    @php $action='Edit product';$controller='Product';@endphp
    @break
@endswitch
<div class="pt-1 pb-0" id="breadcrumbs-wrapper">
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l6">
                <h5 class="breadcrumbs-title">{{$action}}</h5>
            </div>
            <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item">{{$controller}}</li>
                    <li class="breadcrumb-item active">{{$action}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
