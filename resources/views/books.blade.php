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
                            <form action="{{route('bookSearch')}}" method="get">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Search by Keyword" id="keywords"
                                            name="keywords" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="catalog" id="catalog" class="form-control">
                                            <option value="" disabled selected hidden>Search the Catalog</option>
                                            <option value="ddcCode">DDC</option>
                                            <option value="name">Title</option>
                                            <option value="author">Author</option>
                                            <option value="publisher">Publisher</option>
                                            <option value="translator">Translator</option>
                                            <option value="country">Country</option>
                                            <option value="genre">Category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="copies" id="copies" class="form-control">
                                            <option value="" disabled selected hidden>Copies</option>
                                            <option value="1"><50</option>
                                            <option value="2">50-100</option>
                                            <option value="3">100-150</option>
                                            <option value="4">≥150</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="price" id="price" class="form-control">
                                            <option value="" disabled selected hidden>Price</option>
                                            <option value="1"><500</option>
                                            <option value="2">500-1000</option>
                                            <option value="3">1000-1500</option>
                                            <option value="4">≥1500</option>
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
                                <figure>

                                    {{--  input  --}}
                                    <input type="hidden" id="base-url" value="{{ url('/') }}">
                                    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                    <input type="hidden" id="userId{{ $id }}" name="userId"
                                        value="{{ session('userId') }}">
                                    <input type="hidden" id="bookId{{ $id }}" name="bookId" value="{{ $id }}">



                                    {{-- end input --}}
                                    <a href="{{ route('book_detail_byId', compact('id')) }}"><img
                                            src="/storage/{{ $book->image }}" 
                                            alt="Book"></a>
                                    <figcaption>
                                        <header>
                                            <h4><a
                                                    href="{{ route('book_detail_byId', compact('id')) }}">{{ $book->name }}</a>
                                            </h4>
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
                                                    {{-- <a  data-toggle="blog-tags"
                                                        data-placement="top" title="Like" class="button_wishlist" id="{{ $id }}"
                                                    onclick="add_wistlist(this.id);">
                                                    <i class="fa fa-heart"></i>
                                                    </a> --}}
                                                    <a data-toggle="blog-tags" data-placement="top" title="Like"
                                                        class="button_wishlist" id="{{ $id }}"
                                                        onclick="saveFavorite(this.id);">
                                                        <i class="fa fa-heart {{ (!empty($book->favorite)) ? 'liked' : '' }}" id="heart{{ $id }}"></i>
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
                    <!--navigation-->
                    @include('includes.navigation', ['data'=>$books])
                    <!--end navigation-->
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