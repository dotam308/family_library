@extends("mainLayout")
@section('bannerContainer')
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Lỗi 404</h2>
            <span class="underline center"></span>
            <p class="lead">Không tìm được trang.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Trang chủ</a></li>
                <li>Lỗi 404</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->
@endsection
@section("content")
<!-- Start: 404 Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="error-main">
                <div class="container">
                    <div class="error-view">
                        <div class="company-info">
                            <div class="col-md-5 col-md-offset-1 border-dark-left">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="error-box bg-dark margin-left text-center">
                                            <img src="/assets/images/error-img.png" alt="Error Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 border-dark new-user">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="error-info bg-light margin-right">
                                            <h2>OOPS <small>Không tìm thấy trang</small></h2>
                                            <form class="search-404" method="post">
                                                Quay lại trang chủ
                                                <a href="{{ route('index') }}"><i class="fa fa-home"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- End: 404 Section -->
@endsection