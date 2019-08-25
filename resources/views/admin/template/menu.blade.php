<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">

            <ul>
                <li class="submenu home">
                    <a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> <span> Home </span> </a>
                    <ul class="list-unstyled">

                    </ul>
                </li>
                <li class="submenu users">
                    <a href="#"><i class="fa fa-user-circle"></i> <span> User </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="users-create"><a href="{{route('users.create')}}"><i class="fa fa-plus-circle"></i>add User</a></li>
                        <li class="users-index"><a href="{{route('users.index')}}"><i class="fa fa-list-alt"></i>list User</a></li>
                    </ul>
                </li>
                <li class="submenu cates">
                    <a href="{{route('cates.index')}}"><i class="fa fa-list-alt"></i> <span> Category </span> </a>

                </li>
                <li class="submenu products">
                    <a href="#"><i class="fa fa-truck"></i> <span> Product </span> <span
                                class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="products-create"><a href="{{route('products.create')}}"><i class="fa fa-plus-circle"></i>add Product</a></li>
                        <li class="products-index"><a href="{{route('products.index')}}"><i class="fa fa-list-alt"></i>list Product</a></li>
                    </ul>
                </li>
                <li class="submenu comments">
                    <a href="#"><i class="fa fa-comment"></i> <span> Comment </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="comments-create"><a href="{{route('comments.index')}}"><i class="fa fa-plus-circle"></i>List comments</a></li>
                    </ul>
                </li>

                <li class="submenu orders">
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span> Order </span> <span
                                class="menu-arrow"></span></a>
                    <ul class="list-unstyled">

                        <li class="orders-index"><a href="{{route('orders.index')}}"><i class="fa fa-list-alt"></i>list Order</a></li>
                    </ul>
                </li>
            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
