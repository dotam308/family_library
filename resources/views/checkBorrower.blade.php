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
                        Nhập username <input type="text" name="username">

                        <button type="submit">Kiểm tra</button>
                    </form>
                    <div  style="color: blue">
                        <a href="{{ route('signin') }}">Chưa có tài khoản? Đăng ký</a>
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