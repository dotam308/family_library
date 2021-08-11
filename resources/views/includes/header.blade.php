<header id="header-v1" class="navbar-wrapper inner-navbar-wrapper">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="row">
                    <div class="col-md-3">
                        <div class="navbar-header">
                            <div class="navbar-brand">
                                <h1>
                                    <a href="{{ route('index') }}">
                                        <img src="/assets/images/libraria-logo-v1.png" alt="LIBRARIA" />
                                    </a>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <!-- Header Topbar -->
                        <div class="header-topbar hidden-sm hidden-xs">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="topbar-info">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="topbar-links">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Chào mừng {{session('username')}}</a><t></t>
                                        <a href="{{ route('signin') }}"><i class="fa fa-lock"></i>{{ empty(session('username')) ? "Đăng nhập / Đăng ký" : "" }}</a>
                                        <a href="{{ route('logout') }}"><i class="fa fa-logout"></i>{{ empty(session('username')) ? "" : "Đăng xuất" }}</a>
                                        <span>|</span>
                                        <div class="header-cart dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#favorite">
                                                <i class="fa fa-shopping-cart"></i>
                                                <small id="numOfFavoriteBooks">0</small>
                                            </a>
                                            <div id="favorite" class="dropdown-menu cart-dropdown">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-collapse hidden-sm hidden-xs">
                            <ul class="nav navbar-nav">
                                <li class="dropdown {{ isset($active) && $active == "index" ? "active" : "" }}">
                                    <a data-toggle="dropdown" class="dropdown-toggle disabled"
                                        href="{{ route('index') }}">Trang chủ</a>
                                </li>
                                <li class="dropdown {{ isset($active) && $active == "books" ? "active" : "" }}">
                                    <a data-toggle="dropdown" class="dropdown-toggle disabled"
                                        href="{{ route('books') }}">Giá sách</a>
                                </li>
                                {{-- <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="news-events-list-view.html">Tin tức và sự kiện</a>
                                    </li> --}}
                                     @if (session('role') == 'admin')
                                    <li class="dropdown {{ isset($active) && $active == "manage" ? "active" : "" }}" >
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Quản lý</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('manageBooks') }}">Sách</a></li>
                                        <li><a href="{{ route('books_rented') }}">Sách mượn</a></li>
                                        <li><a href="{{route('users')}}">Người mượn</a></li>
                                        <li><a href="{{route('favoriteBooks')}}">Sách yêu thích</a></li>
                                        <li><a href="{{route('checkBorrower')}}">Thêm đơn mượn</a></li>
                                    </ul> 
                                    </li>
                                    @endif
                                <li class="dropdown  {{ isset($active) && $active == "contact" ? "active" : "" }}">
                                    <a href="{{ route('contact')}}">Liên hệ</a>
                                </li>

                                @if( (session('role') != 'admin') && (session('role') != null) )
                                <li class="dropdown {{ isset($active) && $active == "check" ? "active" : "" }}">
                                    <a data-toggle="dropdown" class="dropdown-toggle disabled" >Cá nhân</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('favoriteBooks') }}">Sách yêu thích</a></li>
                                        <li><a href="{{ route('borrowedBooks') }}">Sách đang mượn</a></li>
                                        <li><a href="{{ route('returnedBooks') }}">Sách đã trả</a></li>
                                    </ul>
                                </li>
                                @endif
                                
                                @if(session('role') == 'admin')
                                <li class="dropdown {{ isset($active) && $active == "order" ? "active" : "" }}">
                                    <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Sách mượn</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('waitingOrders') }}">Sách mượn đang chờ xử lý</a></li>
                                        <li><a href="{{ route('borrowingOrders') }}">Sách mượn đang mượn</a></li>
                                        <li><a href="{{ route('returnedOrders') }}">Sách mượn thành công</a></li>
                                    </ul>
                                </li>
                                @endif
                                @if (session('role') == 'admin')
                                    <li class="dropdown {{ isset($active) && $active == "statistic" ? "active" : "" }}" >
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Thống kê</a>
                                        <ul class="dropdown-menu">
                                        <li><a href="{{ route('statisticBook') }}">Sách</a></li>
                                        <li><a href="{{ route('statisticUser') }}">Người mượn</a></li>
                                        <li><a href="{{ route('statisticRent') }}">Lượt mượn</a></li>
                                    </ul> 
                                    </li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu hidden-lg hidden-md">
                    <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                    <div id="mobile-menu">
                        <ul>
                            <li class="mobile-title">
                                <h4>Navigation</h4>
                                <a href="#" class="close"></a>
                            </li>
                            <li>
                                <a href="{{ route('index') }}">Trang chủ</a>
                            </li>
                            <li>
                                <a href="{{ route('books') }}">Giá sách</a>
                            </li>
                            {{--<li>
                                <a href="news-events-list-view.html">News &amp; Events</a>
                                <ul>
                                    <li><a href="news-events-list-view.html">News &amp; Events List View</a></li>
                                    <li><a href="news-events-detail.html">News &amp; Events Detail</a></li>
                                </ul>
                            </li>--}}
                            @if (session('role') == 'admin')
                                <li>
                                    <a href="{{ route('manageBooks') }}">Quản lý</a>
                                <ul>
                                    <li><a href="{{ route('manageBooks') }}">Giá sách</a></li>
                                    <li><a href="{{route('users')}}">Người mượn</a></li>
                                    <li><a href="{{ route('books_rented') }}">Sách mượn</a></li>
                                </ul> 
                                </li>
                            @endif
                            {{--<li>
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="{{ route('cart') }}">Cart</a></li>
                                    <li><a href="{{route('checkout')}}">Checkout</a></li>
                                    <li><a href="{{ route('signin') }}">Signin/Register</a></li>
                                    <li><a href="{{ route('404') }}">404/Error</a></li>
                                </ul>
                            </li>--}}
                            {{--<li>
                                <a href="blog.html">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog Grid View</a></li>
                                    <li><a href="blog-detail.html">Blog Detail</a></li>
                                </ul>
                            </li>
                            <li><a href="services.html">Services</a></li>--}}
                            <li><a href="{{ route('contact')}}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>