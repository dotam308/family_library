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
                                        <a href="tel:+61-3-8376-6284"><i class="fa fa-phone"></i>+61-3-8376-6284</a>
                                        <span>/</span>
                                        <a href="mailto:support@libraria.com"><i
                                                class="fa fa-envelope"></i>support@libraria.com</a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="topbar-links">
                                        
                                        <a href="#">Welcome {{ session('nameUser')  }}</a>
                                        <a href="{{ route('signin') }}"><i class="fa fa-lock"></i>{{ empty(session('nameUser')) ? "Login / Register" : "" }}</a>
                                        <a href="{{ route('logout') }}"><i class="fa fa-logout"></i>{{ empty(session('nameUser')) ? "" : "Logout" }}</a>
                                        <span>|</span>
                                        <div class="header-cart dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <i class="fa fa-shopping-cart"></i>
                                                <small>0</small>
                                            </a>
                                            <div class="dropdown-menu cart-dropdown">
                                                <ul>
                                                    <li class="clearfix">
                                                        <img src="/assets/images/header-cart-image-01.jpg"
                                                            alt="cart item" />
                                                        <div class="item-info">
                                                            <div class="name">
                                                                <a href="#">The Great Gatsby</a>
                                                            </div>
                                                            <div class="author"><strong>Author:</strong> F. Scott
                                                                Fitzgerald</div>
                                                            <div class="price">1 X $10.00</div>
                                                        </div>
                                                        <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                    </li>
                                                    <li class="clearfix">
                                                        <img src="/assets/images/header-cart-image-02.jpg"
                                                            alt="cart item" />
                                                        <div class="item-info">
                                                            <div class="name">
                                                                <a href="#">The Great Gatsby</a>
                                                            </div>
                                                            <div class="author"><strong>Author:</strong> F. Scott
                                                                Fitzgerald</div>
                                                            <div class="price">1 X $10.00</div>
                                                        </div>
                                                        <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                    </li>
                                                    <li class="clearfix">
                                                        <img src="/assets/images/header-cart-image-03.jpg"
                                                            alt="cart item" />
                                                        <div class="item-info">
                                                            <div class="name">
                                                                <a href="#">The Great Gatsby</a>
                                                            </div>
                                                            <div class="author"><strong>Author:</strong> F. Scott
                                                                Fitzgerald</div>
                                                            <div class="price">1 X $10.00</div>
                                                        </div>
                                                        <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                    </li>
                                                </ul>
                                                <div class="cart-total">
                                                    <div class="title">SubTotal</div>
                                                    <div class="price">$30.00</div>
                                                </div>
                                                <div class="cart-buttons">
                                                    <a href="cart.html" class="btn btn-dark-gray">View Cart</a>
                                                    <a href="checkout.html" class="btn btn-primary">Checkout</a>
                                                </div>
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
                                        href="{{ route('index') }}">Home</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index-2.html">Home V1</a></li>
                                        <li><a href="home-v2.html">Home V2</a></li>
                                        <li><a href="home-v3.html">Home V3</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown {{ isset($active) && $active == "books" ? "active" : "" }}">
                                    <a data-toggle="dropdown" class="dropdown-toggle disabled"
                                        href="{{ route('books') }}">Books &amp; Media</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="books-media-list-view.html">Books &amp; Media List View</a>
                                        </li>
                                        <li><a href="books-media-gird-view-v1.html">Books &amp; Media Grid View
                                                V1</a></li>
                                        <li><a href="books-media-gird-view-v2.html">Books &amp; Media Grid View
                                                V2</a></li>
                                        <li><a href="books-media-detail-v1.html">Books &amp; Media Detail V1</a>
                                        </li>
                                        <li><a href="books-media-detail-v2.html">Books &amp; Media Detail V2</a>
                                        </li>
                                    </ul>
                                </li>
                                {{-- <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="news-events-list-view.html">News &amp; Events</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="news-events-list-view.html">News &amp; Events List View</a></li>
                                            <li><a href="news-events-detail.html">News &amp; Events Detail</a></li>
                                        </ul>
                                    </li> --}}
                                     @if (session('role') == 'admin')
                                    <li class="dropdown {{ isset($active) && $active == "manage" ? "active" : "" }}" >
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Manage</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('users')}}">Manage User List</a></li>
                                        <li><a href="{{ route('books_rented') }}">Manage Book Rented List</a></li>
                                        <li><a href="{{ route('manageBooks') }}">Manage Books</a></li>
                                    </ul> 
                                    </li>
                                    @endif
                                <li class="dropdown {{ (isset($active) && $active == "pages") ? "active" : "" }}">
                                    <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Pages</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('cart') }}">Cart</a></li>
                                        <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                        <li><a href="{{ route('signin') }}">Signin/Register</a></li>
                                        <li><a href="{{ route('404') }}">404/Error</a></li>
                                    </ul>
                                </li>
                                {{-- <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="blog.html">Blog</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="blog.html">Blog Grid View</a></li>
                                            <li><a href="blog-detail.html">Blog Detail</a></li>
                                        </ul>
                                    </li> --}}
                                {{-- <li><a href="services.html">Services</a></li> --}}
                                <li class="dropdown  {{ isset($active) && $active == "contact" ? "active" : "" }}">
                                    <a href="{{ route('contact')}}">Contact</a>
                                </li>

                                @if( (session('role') != null) )
                                <li class="dropdown {{ isset($active) && $active == "check" ? "active" : "" }}">
                                    <a data-toggle="dropdown" class="dropdown-toggle disabled" >Check</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('borrowedBooks') }}">Borrowed books list</a></li>
                                        <li><a href="{{ route('returnedBooks') }}">Returned books list</a></li>
                                    </ul>
                                </li>
                                @endif
                                
                                @if(session('role') == 'admin')
                                <li class="dropdown {{ isset($active) && $active == "order" ? "active" : "" }}">
                                    <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">orders</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('waitingOrders') }}">Waiting orders</a></li>
                                        <li><a href="{{ route('borrowingOrders') }}">Borrowing books list</a></li>
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
                                <a href="index-2.html">Home</a>
                                <ul>
                                    <li><a href="index-2.html">Home V1</a></li>
                                    <li><a href="home-v2.html">Home V2</a></li>
                                    <li><a href="home-v3.html">Home V3</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="books-media-list-view.html">Books &amp; Media</a>
                                <ul>
                                    <li><a href="books-media-list-view.html">Books &amp; Media List View</a></li>
                                    <li><a href="books-media-gird-view-v1.html">Books &amp; Media Grid View V1</a>
                                    </li>
                                    <li><a href="books-media-gird-view-v2.html">Books &amp; Media Grid View V2</a>
                                    </li>
                                    <li><a href="books-media-detail-v1.html">Books &amp; Media Detail V1</a></li>
                                    <li><a href="books-media-detail-v2.html">Books &amp; Media Detail V2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="news-events-list-view.html">News &amp; Events</a>
                                <ul>
                                    <li><a href="news-events-list-view.html">News &amp; Events List View</a></li>
                                    <li><a href="news-events-detail.html">News &amp; Events Detail</a></li>
                                </ul>
                            </li>
                            @if (session('role') == 'admin')
                                <li>
                                    <a href="#">Manage</a>
                                <ul>
                                    <li><a href="{{route('users')}}">Manage User List</a></li>
                                    <li><a href="{{ route('books_rented') }}">Manage Book Rented List</a></li>
                                </ul> 
                                </li>
                            @endif
                            <li>
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="{{ route('cart') }}">Cart</a></li>
                                    <li><a href="{{route('checkout')}}">Checkout</a></li>
                                    <li><a href="{{ route('signin') }}">Signin/Register</a></li>
                                    <li><a href="{{ route('404') }}">404/Error</a></li>
                                </ul>
                            </li>
                            @if(session('role')=='admin')
                            <li>
                                <a href="users-list-view.html">Users</a>
                            </li>
                            @endif
                            <li>
                                <a href="blog.html">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog Grid View</a></li>
                                    <li><a href="blog-detail.html">Blog Detail</a></li>
                                </ul>
                            </li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="{{ route('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>