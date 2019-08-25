<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrator for laravel 5.8</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/default/assets/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">

    <script>
        laravel={!! json_encode(['csrf'=>csrf_token()]) !!}
    </script>

    @yield('header')


</head>

<body class="adminbody">

<div id="main">

    <!-- file header blade -->
    @include('admin.template.header')
    <!-- end file header blade -->


    <!-- Left Sidebar -->
@include('admin.template.menu')

    <!-- End Sidebar -->


    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <?php $controller=explode('.',Route::currentRouteName())[0];?>
                            <h1 class="main-title float-left" style="text-transform:capitalize;">{{$controller}}</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">{{$controller}}</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->



                {{--content--}}
                @include('admin.template.message')
                @yield('content')
                {{--end content--}}





            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->

    <footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="">2019 &copy;</a>
		</span>
        <span class="float-right">
		Developed by <a target="_blank" href=""><b>Huy Phan</b></a>
		</span>
    </footer>

</div>

<script>
    url='{{ Route::currentRouteName()}}'
</script>

<script src="{{asset('assets/js/jquery.js')}}"></script>
@yield('footer')
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

</body>
</html>
