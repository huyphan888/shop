<div class="headerbar">

    <!-- LOGO -->
    <div class="headerbar-left">
        <a href="{{url('')}}" class="logo"><img alt="Logo" src="{{asset('assets/images/logo.png')}}" /> <span>Admin</span></a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="index.html" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{Auth::user()->img?asset(Auth::user()->img):asset('uploads/no_image.jpg')}}" alt="Profile image" class="avatar-rounded">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                </div>
            </li>
            <span class="text-overflow text-white">{{Auth::user()->name}},   </span>
            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a id='logout' href="" style="color: #ff9759;" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout <i class="fa fa-power-off"></i> </a>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </li>
        </ul>

    </nav>

</div>
