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
                    <form method="POST" action="">
                        @csrf
                        <h3>Nhập thông tin mượn sách</h3>
                        <table table table-hover>
                            <tr>
                                <th>Mã người mượn</th>
                                <td><input type="text" name="userId" class="form-control" value="{{ $borrower->userId }}" disabled /></td>
                            </tr>
                            <tr>
                                <th>Tên người mượn</th>
                                <td><input type="text" name="name" class="form-control" value="{{ $borrower->name }}" disabled /></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><input type="email" name="email" class="form-control" value="{{ $borrower->email ?? "chưa cập nhật" }}" disabled/></td>
                            </tr>
                            <tr>
                                <th>Tìm sách</th>
                                <td >
                                    <form method="post" action="">
                                        @csrf
                                        <input type="text" name="keywords"class="form-control">
                                        <button class="btn btn-xs-primary">Tìm</button>
                                    </form>
                                </td>
                            </tr>
                        </table>

                        <button type="submit">Kiểm tra</button>
                    </form>

                </div>


            </div>
    </div>
</div>
</div>
</main>
</div>
</div>
@endsection