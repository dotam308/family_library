@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Books & Media Listing</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Home</a></li>
                <li>Books & Media</li>
            </ul>
        </div>
    </div>
</section>
@endsection
@section('content')
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="books-full-width">
                <div class="container">
                    <!-- Start: Search Section -->
                    <section class="search-filters">
                        <div class="filter-box">
                            <h3>What are you looking for at the library?</h3>
                            <form action="http://libraria.demo.presstigers.com/index.html" method="get">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Search by Keyword" id="keywords"
                                            name="keywords" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="catalog" id="catalog" class="form-control">
                                            <option>Search the Catalog</option>
                                            <option>Catalog 01</option>
                                            <option>Catalog 02</option>
                                            <option>Catalog 03</option>
                                            <option>Catalog 04</option>
                                            <option>Catalog 05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="category" id="category" class="form-control">
                                            <option>All Categories</option>
                                            <option>Category 01</option>
                                            <option>Category 02</option>
                                            <option>Category 03</option>
                                            <option>Category 04</option>
                                            <option>Category 05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" type="submit" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="clear"></div>
                    </section>
                    <!-- End: Search Section -->
                    @if (session('role') == 'admin')
                        <a type="button" class="btn btn-primary" href="{{ route('addBook') }}">Thêm sách</a>
                    @endif
                    <div class="filter-options margin-list">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <select name="orderby">
                                    <option selected="selected">Sort by Title</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by rating</option>
                                    <option>Sort by newness</option>
                                    <option>Sort by price</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <select name="orderby">
                                    <option selected="selected">Sort by Author</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by rating</option>
                                    <option>Sort by newness</option>
                                    <option>Sort by price</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <select name="orderby">
                                    <option selected="selected">Language</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by rating</option>
                                    <option>Sort by newness</option>
                                    <option>Sort by price</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <select name="orderby">
                                    <option selected="selected">Publishing Date</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by rating</option>
                                    <option>Sort by newness</option>
                                    <option>Sort by price</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-12 pull-right">
                                <div class="filter-toggle">
                                    <a href="books-media-gird-view-v2.html" class="active"><i
                                            class="glyphicon glyphicon-th-large"></i></a>
                                    <a href="books-media-list-view.html"><i class="glyphicon glyphicon-th-list"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="booksmedia-fullwidth">
                        <ul>
                            @forelse ($books as $book)
                            <?php $id = $book->id; ?>
                            <li>
                                @if (session('role') == 'admin')
                                    <a href="{{ route('editBook', compact('id')) }}"><i class="fa fa-edit"></i></a></i>
                                @endif
                                @if (session('role') == 'admin')
                                    <a href="{{ route('deleteBook', compact('id')) }}"><i class="fa fa-trash"></i></a></i>
                                @endif
                                <div class="book-list-icon blue-icon"></div>
                                <figure>
                                    
                                    <a href="books-media-detail-v2.html"><img
                                            src="/storage/{{ $book->image }}"
                                            alt="Book"></a>
                                    <figcaption>
                                        <header>
                                            <h4><a href="books-media-detail-v2.html">{{ $book->name }}</a></h4>
                                            <p><strong>Author:</strong> {{ $book->author }}</p>
                                            <p><strong>DdcCode:</strong> {{ $book->ddcCode }}</p>
                                        </header>
                                        <p>(Nội dung chính)</p>
                                        <div class="actions">
                                            <ul>
                                                <li>
                                                    <a href="#" target="_blank" data-toggle="blog-tags"
                                                        data-placement="top" title="Add TO CART">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank" data-toggle="blog-tags"
                                                        data-placement="top" title="Like">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank" data-toggle="blog-tags"
                                                        data-placement="top" title="Mail">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank" data-toggle="blog-tags"
                                                        data-placement="top" title="Search">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank" data-toggle="blog-tags"
                                                        data-placement="top" title="Print">
                                                        <i class="fa fa-print"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank" data-toggle="blog-tags"
                                                        data-placement="top" title="Share">
                                                        <i class="fa fa-share-alt"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            @empty
                            <div>No books</div>
                            @endforelse
                        </ul>
                    </div>
                    <nav class="navigation pagination text-center">
                        <h2 class="screen-reader-text">Posts navigation</h2>
                        <div class="nav-links">
                            <a class="prev page-numbers" href="#."><i class="fa fa-long-arrow-left"></i> Previous</a>
                            <a class="page-numbers" href="#.">1</a>
                            <span class="page-numbers current">2</span>
                            <a class="page-numbers" href="#.">3</a>
                            <a class="page-numbers" href="#.">4</a>
                            <a class="next page-numbers" href="#.">Next <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </nav>
                </div>
                <!-- Start: Staff Picks -->
                <section class="team staff-picks">
                    <div class="container">
                        <div class="center-content">
                            <h2 class="section-title">Staff Picks</h2>
                            <span class="underline center"></span>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="team-list">
                            <div class="team-member">
                                <figure>
                                    <img src="/assets/images/books-media/staff-pick/staff-picks-01.jpg"
                                        alt="Staff Pick" />
                                </figure>
                                <div class="content-block">
                                    <div class="member-info">
                                        <div class="member-thumb">
                                            <img src="/assets/images/books-media/staff-pick/gail.jpg" alt="Katherine">
                                        </div>
                                        <div class="member-content">
                                            <span class="designation">Downtown & Business</span>
                                            <h4>The Collector</h4>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-skype"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p>The point of using Lorem Ipsum is that it has a more-or-less normal
                                            distribution of letters, as opposed to using 'Content here...</p>
                                        <a class="btn btn-primary" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-member">
                                <figure>
                                    <img src="/assets/images/books-media/staff-pick/staff-picks-02.jpg"
                                        alt="Staff Pick" />
                                </figure>
                                <div class="content-block">
                                    <div class="member-info">
                                        <div class="member-thumb">
                                            <img src="/assets/images/books-media/staff-pick/katherine.jpg"
                                                alt="Katherine">
                                        </div>
                                        <div class="member-content">
                                            <span class="designation">Katherine, West End</span>
                                            <h4>Mongolia</h4>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-skype"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p>The point of using Lorem Ipsum is that it has a more-or-less normal
                                            distribution of letters, as opposed to using 'Content here...</p>
                                        <a class="btn btn-primary" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-member">
                                <figure>
                                    <img src="/assets/images/books-media/staff-pick/staff-picks-03.jpg"
                                        alt="Staff Pick" />
                                </figure>
                                <div class="content-block">
                                    <div class="member-info">
                                        <div class="member-thumb">
                                            <img src="/assets/images/books-media/staff-pick/chris.jpg" alt="Katherine">
                                        </div>
                                        <div class="member-content">
                                            <span class="designation">Chris, East Liberty</span>
                                            <h4>The Revolution</h4>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-skype"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p>The point of using Lorem Ipsum is that it has a more-or-less normal
                                            distribution of letters, as opposed to using 'Content here...</p>
                                        <a class="btn btn-primary" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End: Staff Picks -->
            </div>
        </main>
    </div>
</div>
@endsection