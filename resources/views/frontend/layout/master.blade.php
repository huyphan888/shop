<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Electronic shop</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('themes/default/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('themes/default/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/default/assets/css/toast.min.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('themes/default/assets/css/font-awesome.min.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('themes/default/assets/images/favicon.ico') }}">
    @yield('styles')
</head>
<body>

<div class="wrapper" id="app">
    @include('frontend.layout.topbar')
    @include('frontend.layout.header')
    {{-- Content --}}
    @yield('content')
    @include('frontend.layout.footer')
    {{-- End Content --}}
</div>

<script>
    var images = '{{asset('themes/default/assets/images')}}';
    var token='{{csrf_token()}}'
</script>
<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('themes/default/assets/js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/jquery-migrate-1.2.1.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/css_browser_selector.min.js') }}"></script>

<script src="{{ asset('themes/default/assets/js/echo.min.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/jquery.raty.min.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/jquery.prettyPhoto.min.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/jquery.customSelect.min.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('themes/default/assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/toastr.js') }}"></script>


@yield('body_scripts')

    <script src="{{asset('assets/js/vue.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>

    <script>
        // headers: {'X-Requested-With': 'XMLHttpRequest'}
        new Vue({
            el: "#app",
            data:{
                cart:[],
                total:0,
                sumPrice:0,
                quantity:1
            },
            methods:{
                addToCart(id){
                    axios.post('{{route('api.cart.add')}}',{
                        id:id,quantity:1
                    }).then( (response)=> {
                        data = response.data
                        this.cart = data.cart
                        this.total=data.total
                        this.sumPrice=data.sum
                        Command: toastr["success"]("", "Click view cart on the top website to view your shopping cart")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-bottom-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }


                    })
                },
                getCart(){
                    axios.get('{{route('api.cart.get')}}').then( (response)=> {
                        data = response.data
                        this.cart = data.cart?data.cart:[]
                        this.total=data.total?data.total:0
                        this.sumPrice=data.sum?data.sum:0

                    })
                },
                updateCart(id){
                    this.quantity=this.cart[id].quantity
                    axios.post('{{route('api.cart.update')}}',{
                        id:id,quantity:this.cart[id].quantity
                    }).then( (response)=> {
                        data = response.data
                        this.cart = data.cart
                        // this.total=data.total
                        this.sumPrice=data.sum
                    })
                },
                increase(id){
                    this.cart[id].quantity++
                    this.quantity=this.cart[id].quantity

                    axios.post('{{route('api.cart.update')}}',{
                        id:id,quantity:this.cart[id].quantity
                    }).then( (response)=> {
                        data = response.data
                        this.cart = data.cart

                        this.sumPrice=data.sum
                    })

                },
                decrease(id){
                    this.cart[id].quantity--
                    this.quantity=this.cart[id].quantity
                    axios.post('{{route('api.cart.update')}}',{
                        id:id,quantity:this.cart[id].quantity
                    }).then( (response)=> {
                        data = response.data
                        this.cart = data.cart
                        this.sumPrice=data.sum
                    })
                },
                deletes(id){
                    axios.post('{{route('frontend.cart.delete')}}',{
                        id:id
                    }).then( (response)=> {
                        data = response.data
                        this.cart = data.cart
                        this.total=data.total
                        this.sumPrice=data.sum

                    })
                }

            },
            created(){
                this.getCart();
            }

        })
    </script>

</body>
</html>
