@extends("mainLayout")
@section("bannerContainer")
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Giá sách</h2>
            <span class="underline center"></span>
            <p class="lead">Sách là bạn tốt.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ route('index') }}">Trang chủ</a></li>
                <li>Giá sách</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->
@endsection
@section("content")
<!-- Start: Products Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="booksmedia-detail-main">
                <div class="container">
                    <div class="row" style="height: 200px;">
                        <!-- Start: Search Section -->
                        <!-- End: Search Section -->
                    </div>
                    <div class="booksmedia-detail-box">
                        <div class="detailed-box">
                            <div class="col-xs-12 col-sm-5 col-md-3">
                                <div class="post-thumbnail">
                                    {{-- <div class="book-list-icon blue-icon"></div> --}}
                                    <img src="{{ $book->image }}" alt="Book Image">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-6">
                                <div class="post-center-content">
                                    <h2>{{ $book->name }}</h2>
                                    <p><strong>Tác giả:</strong> {{ $book->author }}</p>
                                    <p><strong>Mã DDC:</strong> {{ $book->ddcCode }}</p>
                                    <p><strong>Người dịch:</strong> {{ $book->translator }}</p>
                                    <p><strong>Nhà xuất bản:</strong> {{ $book->publisher }}</p>
                                    <p><strong>Ngôn ngữ:</strong> {{ $book->country }}</p>
                                    <p><strong>Thể loại:</strong> {{ $book->genre }}</p>
                                    
                                    <?php $id = $book->id; ?>
                                    {{--  input  --}}
                                    <input type="hidden" id="base-url" value="{{ url('/') }}">
                                    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                    <input type="hidden" id="userId{{ $id }}" name="userId"
                                        value="{{ session('userId') }}">
                                    <input type="hidden" id="bookId{{ $id }}" name="bookId" value="{{ $id }}">



                                    {{-- end input --}}
                                    @if (session('role') != 'admin')
                                        <a href="{{ route('borrowBook', compact('id')) }}"
                                            class="btn btn-primary">Mượn</a>
                                    @endif
                                    <div class="actions">
                                        <ul>
                                            <li>
                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                                    title="" data-original-title="Add To Cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <?php $id = $book->id;  ?>
                                                <a data-toggle="blog-tags" data-placement="top" title="Like"
                                                    class="button_wishlist" id="{{ $id }}"
                                                    onclick="saveFavorite({{ $id }});">
                                                    <i class="fa fa-heart <?=  (!empty($book->favorite)) ? "liked" : ""?>"
                                                        id="heart{{ $id }}"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                                    title="" data-original-title="Mail">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                                    title="" data-original-title="Search">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                                    title="" data-original-title="Print">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                                    title="" data-original-title="Share">
                                                    <i class="fa fa-share-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        <p><strong>Summary:</strong> {{ $book->review ?? 'Chưa có tho' }} </p>

                        <div class="table-tabs" id="responsiveTabs">
                            <ul class="nav nav-tabs">
                                <li><b class="arrow-up"></b><a data-toggle="tab" href="#sectionB">Bình luận</a></li>
                                
                            </ul>
                            <div class="tab-content">
                                <div id="sectionB" class="tab-pane fade in">
                                    <p>Bạn nghĩ gì về cuốn sách này :v</p>

                                    <div class="fb-comments"
                                        data-href="http://127.0.0.1:8000/book_detail_byId?id={{ $id }}#sectionB" data-width=""
                                        data-numposts=""></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- End: Products Section -->
<div class="booksmedia-fullwidth">
    <div class="container">
        <h2 class="section-title text-center">Top sách phổ biến</h2>
        <span class="underline center"></span>
        <p class="lead text-center">Sách là bạn</p>
        {{-- <ul class="popular-items-detail-v2">
            <li>
                <div class="book-list-icon blue-icon"></div>
                <figure>
                    <img src="/assets/images/books-media/layout-3/books-media-layout3-01.jpg" alt="Book">
                    <figcaption>
                        <header>
                            <h4><a href="#.">The Great Gatsby</a></h4>
                            <p><strong>Author:</strong> F. Scott Fitzgerald</p>
                            <p><strong>ISBN:</strong> 9781581573268</p>
                        </header>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                        <div class="actions">
                            <ul>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Add To Cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Like">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Mail"><i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Search">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Print">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Share">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li>
                <div class="book-list-icon yellow-icon"></div>
                <figure>
                    <img src="/assets/images/books-media/layout-3/books-media-layout3-02.jpg" alt="Book">
                    <figcaption>
                        <header>
                            <h4><a href="#.">The Great Gatsby</a></h4>
                            <p><strong>Author:</strong> F. Scott Fitzgerald</p>
                            <p><strong>ISBN:</strong> 9781581573268</p>
                        </header>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                        <div class="actions">
                            <ul>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Add To Cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Like">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Mail"><i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Search">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Print">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Share">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li>
                <div class="book-list-icon green-icon"></div>
                <figure>
                    <img src="/assets/images/books-media/layout-3/books-media-layout3-03.jpg" alt="Book">
                    <figcaption>
                        <header>
                            <h4><a href="#.">The Great Gatsby</a></h4>
                            <p><strong>Author:</strong> F. Scott Fitzgerald</p>
                            <p><strong>ISBN:</strong> 9781581573268</p>
                        </header>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                        <div class="actions">
                            <ul>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Add To Cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Like">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Mail"><i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Search">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Print">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Share">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li>
                <div class="book-list-icon blue-icon"></div>
                <figure>
                    <img src="/assets/images/books-media/layout-3/books-media-layout3-01.jpg" alt="Book">
                    <figcaption>
                        <header>
                            <h4><a href="#.">The Great Gatsby</a></h4>
                            <p><strong>Author:</strong> F. Scott Fitzgerald</p>
                            <p><strong>ISBN:</strong> 9781581573268</p>
                        </header>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                        <div class="actions">
                            <ul>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Add To Cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Like">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Mail"><i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Search">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Print">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Share">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li>
                <div class="book-list-icon yellow-icon"></div>
                <figure>
                    <img src="/assets/images/books-media/layout-3/books-media-layout3-02.jpg" alt="Book">
                    <figcaption>
                        <header>
                            <h4><a href="#.">The Great Gatsby</a></h4>
                            <p><strong>Author:</strong> F. Scott Fitzgerald</p>
                            <p><strong>ISBN:</strong> 9781581573268</p>
                        </header>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                        <div class="actions">
                            <ul>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Add To Cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Like">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Mail"><i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Search">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Print">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Share">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li>
                <div class="book-list-icon green-icon"></div>
                <figure>
                    <img src="/assets/images/books-media/layout-3/books-media-layout3-03.jpg" alt="Book">
                    <figcaption>
                        <header>
                            <h4><a href="#.">The Great Gatsby</a></h4>
                            <p><strong>Author:</strong> F. Scott Fitzgerald</p>
                            <p><strong>ISBN:</strong> 9781581573268</p>
                        </header>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                        <div class="actions">
                            <ul>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Add To Cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Like">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Mail"><i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Search">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Print">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top"
                                        title="Share">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </figcaption>
                </figure>
            </li>
        </ul> --}}
    </div>
</div>
@endsection