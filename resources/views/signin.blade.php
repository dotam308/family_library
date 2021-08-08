@extends("mainLayout")
@section("bannerContainer")

<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Đăng nhập</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Trang chủ</a></li>
                <li>Đăng nhập</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->
@endsection
@section("content")
<!-- Start: Cart Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="signin-main">
                <div class="container">
                    <div class="woocommerce">
                        <div class="woocommerce-login">
                            <div class="company-info signin-register">
                                <div class="col-md-5 col-md-offset-1 border-dark-left">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="company-detail bg-dark margin-left">
                                                <div class="signin-head">
                                                    <h2>Đăng nhập</h2>
                                                    <span class="underline left"></span>
                                                </div>
                                                @php
                                                    // dd($_REQUEST);
                                                @endphp
                                                <form class="login" method="post">
                                                    @csrf
                                                    <p class="form-row form-row-first input-required">
                                                        {{-- <label>
                                                            <span class="first-letter">Tên đăng nhập</span>
                                                            <span class="second-letter">*</span>
                                                        </label> --}}
                                                        <input type="text" id="username" name="username"
                                                            class="input-text" placeholder="Tên đăng nhập *" value="{{ $_REQUEST['username'] ?? '' }}">
                                                    </p>
                                                    <p class="form-row form-row-last input-required">
                                                        {{-- <label>
                                                            <span class="first-letter">Mật khẩu</span>
                                                            <span class="second-letter">*</span>
                                                        </label> --}}
                                                        <input type="password" id="password" name="password"
                                                            class="input-text" placeholder="Mật khẩu *">
                                                    </p>
                                                    <div class="clear"></div>
                                                    <div class="password-form-row">
                                                        <p class="form-row input-checkbox">
                                                            <input type="checkbox" value="forever" id="rememberme"
                                                                name="rememberme">
                                                            <label class="inline" for="rememberme">Ghi nhớ</label>
                                                        </p>
                                                        <p class="lost_password">
                                                            <a href="#">Quên mật khẩU?</a>
                                                        </p>
                                                    </div>
                                                    <input type="submit" value="Đăng nhập" name="login"
                                                        class="button btn btn-default">
                                                    <div class="clear"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 border-dark new-user">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="company-detail new-account bg-light margin-right">
                                                <div class="new-user-head" style="height:59px">
                                                    <h2>Tạo tài khoản</h2>
                                                    <span class="underline left"></span>
                                                </div>
                                                <form class="login" method="post">
                                                    @csrf
                                                    <p class="form-row form-row-first input-required">
                                                        {{-- <label>
                                                            <span class="first-letter">Tên đầy đủ</span>
                                                            <span class="second-letter">*</span>
                                                        </label> --}}
                                                        <input type="text" id="name" name="name" class="input-text"
                                                        placeholder="Tên đầy đủ *">
                                                    </p>
                                                    <p class="form-row input-required">
                                                        {{-- <label>
                                                            <span class="first-letter">Tên đăng nhập</span>
                                                            <span class="second-letter">*</span>
                                                        </label> --}}
                                                        <input type="text" id="username1" name="username"
                                                            class="input-text" placeholder="Tên đăng nhập *">
                                                    </p>
                                                    <p class="form-row input-required">
                                                        {{-- <label>
                                                            <span class="first-letter">Mật khẩu</span>
                                                            <span class="second-letter">*</span>
                                                        </label> --}}
                                                        <input type="password" id="password1" name="password"
                                                            class="input-text" placeholder="Mật khẩu *">
                                                    </p>
                                                    <div class="clear"></div>
                                                    <input type="submit" value="Đăng ký" name="signup"
                                                        class="button btn btn-default">
                                                    <div class="clear"></div>
                                                </form>
                                            </div>
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
<!-- End: Cart Section -->
@endsection