@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Quản lý</h2>
            <span class="underline center"></span>
            <p class="lead">Sách là bạn.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Quản lý</a></li>
                <li>Thêm đơn mượn</li>
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
                        <br>
                        <br>
                        Nhập username <input type="text" name="username">

                        <button type="submit" name="check">Kiểm tra</button>
                    </form>
                    {{-- <div  style="color: blue">
                        <a href="{{ route('signin') }}">Chưa có tài khoản? Đăng ký</a>
                    </div> --}}
                    <br>
                    <br>
                    <br>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#masuk">Đăng ký</button>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="company-detail new-account bg-light margin-right">
                                <div class="new-user-head" style="height:59px">
                                    {{-- <h2 style="color: #000;">Tạo tài khoản</h2> --}}
                                    <span class="underline left"></span>
                                </div>
                                <div class="modal fade" id="masuk" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Đăng ký</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="login" method="post"  action="#">
                                                    @csrf
                                                    {{-- <p class="form-row form-row-first input-required">
<<<<<<< HEAD
                                                        <input type="text" id="name" name="name" class="input-text form-control"
                                                        placeholder="Tên đầy đủ *">
                                                    </p>
                                                    <p class="form-row input-required">
                                                        <input type="text" id="username1" name="username"
                                                            class="input-text form-control" placeholder="Tên đăng nhập *">
                                                    </p>
                                                    <p class="form-row input-required">
                                                        <input type="password" id="password1" name="password"
                                                            class="input-text form-control" placeholder="Mật khẩu *">
======= --}}
                                                        <input type="text" id="name" name="name" class="input-text" style="width: 80%"
                                                        placeholder="Tên đầy đủ *">
                                                    </p>
                                                    <p class="form-row input-required">
                                                        <input type="text" id="username1" name="username" style="width: 80%"
                                                            class="input-text" placeholder="Tên đăng nhập *">
                                                    </p>
                                                    <p class="form-row input-required">
                                                        <input type="password" id="password1" name="password" style="width: 80%"
                                                            class="input-text" placeholder="Mật khẩu *">

                                                    </p>
                                                    <div class="clear"></div>
                                                    <input type="submit" value="Đăng ký" name="signup"
                                                        class="button btn btn-default">
                                                    <div class="clear"></div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary m-t-10" data-dismiss="modal"> Đóng</button>
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