@extends("mainLayout")
@section("content")
<!-- Start: Slider Section -->
<div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">

    <!-- Carousel slides -->
    <div class="carousel-inner">
        <div class="item active">
            <figure>
                <img alt="Home Slide" src="/assets/images/header-slider/home-v1/header-slide.jpg" />
            </figure>
            <div class="container">
                <div class="carousel-caption">
                    <h2>Sách là bạn</h2>
                    <p> Một cuốn sách hay trên giá sách là một người bạn dù quay lưng lại nhưng vẫn là bạn tốt. </p>
                    <div class="slide-buttons hidden-sm hidden-xs">
                        <a href="#" class="btn btn-primary">Đọc thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#home-v1-header-carousel" data-slide="prev"></a>
    <a class="right carousel-control" href="#home-v1-header-carousel" data-slide="next"></a>
</div>
<!-- End: Slider Section -->

<!-- Start: Search Section -->
<section class="search-filters">
    <div class="container">
        <div class="filter-box">
            <form action="{{route('bookSearch')}}" method="get">
                <div class="col-md-4 col-sm-6" style="width:615px">
                    <div class="form-group">
                        <input class="form-control" placeholder="Từ khoá" id="keywords"
                            name="keywords" type="text">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <select name="catalog" id="catalog" class="form-control">
                            <option value="" disabled selected hidden>Tìm kiếm theo</option>
                            <option value="ddcCode">DDC</option>
                            <option value="name">Tiêu đề</option>
                            <option value="author">Tác giả</option>
                            <option value="publisher">Nhà xuất bản</option>
                            <option value="translator">Người dịch</option>
                            <option value="country">Quốc gia</option>
                            <option value="genre">Thể loại</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                        <input class="form-control" type="submit" value="Tìm kiếm">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End: Search Section -->

<!-- Start: Welcome Section -->
<section class="welcome-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="welcome-wrap">
                    <div class="welcome-text">
                        <h2 class="section-title">Chào mừng đến thư viện</h2>
                        <span class="underline left"></span><br/>
                        <p><strong>Một cuốn sách hay cho ta một điều tốt, một người bạn tốt cho ta một điều hay.</strong>

                            Từ lâu thư viện đã được coi là “kho vàng” của nền văn hóa dân tộc, là một bộ phận không thể thiếu trong văn hóa học đường.
                             Thư viện bổ sung và cập nhật những kiến thức mới, những phương pháp giảng dạy tiên tiến làm cho việc học tập và giảng dạy thêm sinh động và hấp dẫn. </p>
                            
                        <a class="btn btn-primary" href="#">Đọc thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="facts-counter">
                    <ul>
                        <li class="bg-light-green">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="ebook"></i>
                                </div>
                                <span>Có<strong class="fact-counter">{{$quantityBook}}</strong> quyển sách</span>
                            </div>
                        </li>
                        <li class="bg-green">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="eaudio"></i>
                                </div>
                                <span>Thể loại<strong class="fact-counter">{{$booktype}}</strong></span>
                            </div>
                        </li>
                        <li class="bg-red">
                            <div class="fact-item">
                                <div class="fact-icon">
                                    <i class="magazine"></i>
                                </div>
                                <span>Thành viên<strong class="fact-counter">{{$userquantity}}</strong></span>
                            </div>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome-image"></div>
</section>
<!-- End: Welcome Section -->

<!-- Start: Category Filter -->
<section class="category-filter section-padding">
    <div class="container">
        <div class="center-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="section-title">Các ấn bản mới được phát hành!</h2>
                    <span class="underline center"></span><br/>
                </div>
            </div>
        </div>
        <div class="filter-buttons">
            <div class="filter btn" data-filter="all">Tất cả</div>
            <div class="filter btn" data-filter=".adults">Người lớn</div>
            <div class="filter btn" data-filter=".kids-teens">Trẻ em &amp; Thiếu niên</div>
            <div class="filter btn" data-filter=".video">Video</div>
            <div class="filter btn" data-filter=".audio">Audio</div>
            <div class="filter btn" data-filter=".books">Sách</div>
            <div class="filter btn" data-filter=".magazines">Tạp chí</div>
        </div>
    </div>
    <div id="category-filter">
        <ul class="category-list">
            <li class="category-item adults">
                <figure>
                    <img src="{{ asset("assets/images/category-filter/home-v1/category-filter-img-01.jpg") }}"
                        alt="New Releaase" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>The Great Gatsby</h4>
                            <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                            <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>It is a long established fact that a reader will be distracted by the readable content of
                                a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                            <ol>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item kids-teens">
                <figure>
                    <img src="/assets/images/category-filter/home-v1/category-filter-img-02.jpg" alt="New Releaase" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>The Great Gatsby</h4>
                            <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                            <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>It is a long established fact that a reader will be distracted by the readable content of
                                a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                            <ol>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item video">
                <figure>
                    <img src="/assets/images/category-filter/home-v1/category-filter-img-03.jpg" alt="New Releaase" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>The Great Gatsby</h4>
                            <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                            <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>It is a long established fact that a reader will be distracted by the readable content of
                                a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                            <ol>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item audio">
                <figure>
                    <img src="/assets/images/category-filter/home-v1/category-filter-img-04.jpg" alt="New Releaase" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>The Great Gatsby</h4>
                            <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                            <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>It is a long established fact that a reader will be distracted by the readable content of
                                a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                            <ol>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item books">
                <figure>
                    <img src="/assets/images/category-filter/home-v1/category-filter-img-05.jpg" alt="New Releaase" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>The Great Gatsby</h4>
                            <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                            <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>It is a long established fact that a reader will be distracted by the readable content of
                                a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                            <ol>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item magazines">
                <figure>
                    <img src="/assets/images/category-filter/home-v1/category-filter-img-06.jpg" alt="New Releaase" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>The Great Gatsby</h4>
                            <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                            <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>It is a long established fact that a reader will be distracted by the readable content of
                                a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                            <ol>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item adults">
                <figure>
                    <img src="/assets/images/category-filter/home-v1/category-filter-img-07.jpg" alt="New Releaase" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>The Great Gatsby</h4>
                            <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                            <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>It is a long established fact that a reader will be distracted by the readable content of
                                a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                            <ol>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </figcaption>
                </figure>
            </li>
            <li class="category-item kids-teens">
                <figure>
                    <img src="/assets/images/category-filter/home-v1/category-filter-img-08.jpg" alt="New Releaase" />
                    <figcaption class="bg-orange">
                        <div class="info-block">
                            <h4>The Great Gatsby</h4>
                            <span class="author"><strong>Author:</strong> F. Scott Fitzgerald</span>
                            <span class="author"><strong>ISBN:</strong> 9781581573268</span>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <p>It is a long established fact that a reader will be distracted by the readable content of
                                a page when looking at its layout. Pellentesque dolor turpis, pulvinar varius.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                            <ol>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </figcaption>
                </figure>
            </li>
        </ul>
        <div class="center-content">
            <a href="#" class="btn btn-primary">Xem thêm</a>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
<section class="newsletter section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="center-content">
                    <h2 class="section-title">Đăng ký bản tin tại đây!</h2>
                    <span class="underline center"></span><br/>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Nhập Email!" id="newsletter" name="newsletter"
                        type="email">
                    <input class="form-control" value="Đăng ký" type="submit">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection