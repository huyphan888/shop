<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-6 no-margin">
            <ul>
                <li><a href="{{url('')}}">@lang('home.Home')</a></li>
                <li><a href="">@lang('home.Contact')</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">@lang('home.Pages')</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="">Home</a></li>
                        <li><a href="">Home Alt</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.col -->

        <div class="col-xs-12 col-sm-6 no-margin">
            <ul class="right">
                <li class="dropdown">
                    @if(App::isLocale('en'))
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">
                        <img src="{{asset('themes/default/assets/images/www/eng.gif')}}" alt="" width="20px">
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="{{url()->current().'?lang=vi'}}">
                                <img src="{{asset('themes/default/assets/images/www/vn.png')}}" alt="" width="20px"> Vietnamese</a>
                        </li>
                    </ul>
                    @else
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('themes/default/assets/images/www/vn.png')}}" alt="" width="20px"></a>

                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="{{url()->current().'?lang=en'}}">
                                <img src="{{asset('themes/default/assets/images/www/eng.gif')}}" alt="" width="20px"> English
                            </a>
                        </li>
                    </ul>
                    @endif
                </li>
                @auth
                    <li><span class="text-danger" style="font-size: 13px">{{__('welcome')}} </span><span style="font-size: 13px">{{Auth::user()->name}},</span>
                        <a class='text-success' href="{{url('admin/users')}}">Admin page</a>
                        <a href="" onclick="event.preventDefault();document.getElementById('form-logout').submit()">Logout</a>  </li>
                    <form action="{{route('logout')}}" method="post" id="form-logout">
                        @csrf
                    </form>

                @else
                    <li><a href="{{route('register')}}">{{__('Register')}}</a></li>
                    <li><a href="{{route('login')}}">{{__('Login')}}</a></li>
                @endauth
            </ul>
        </div><!-- /.col -->
    </div><!-- /.container -->
</nav><!-- /.top-bar -->
