@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Giá sách</h2>
            <span class="underline center"></span>
            <p class="lead">Sách là bạn.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Trang chủ</a></li>
                <li>Giá sách</li>
            </ul>
        </div>
    </div>
</section>
@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@php
    if (!empty($message )) {
        echo "<script>alert('$message')</script>";
    }
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="books-full-width">
                <div class="container" style="height: 400px">
                    <form method="POST" action="{{ route('checkBorrowerUsername') }}">
                        @csrf

                        <h3>Nhập thông tin người mượn</h3>
                        <br>
                        Nhập username <input type="text" name="username">

                        <button type="submit" name="check">Kiểm tra</button>
                    </form>
                    <br><br>
                    <div  style="color: blue">
                       <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Chưa có tài khoản? Đăng ký!
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div class="col-md-5 border-dark new-user">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="company-detail new-account bg-light margin-right">
                                                <br>
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

                </div>


            </div>
    </div>
</div>
</div>
</main>
</div>
</div>
@endsection