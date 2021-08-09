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
                    <form method="POST" action="">
                        @csrf
                        <h3>Nhập thông tin mượn sách</h3>
                        <table table table-hover>
                            <tr>
                                <th>Mã người mượn</th>
                                <td>
                                    <input type="hidden" name="userId" value="{{ $borrower->userId }}">
                                    <input type="text" name="userid" class="form-control" value="{{ $borrower->userId }}" disabled /></td>
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
                                <th>Ngày dự định trả</th>
                                <td><input type="date" name="returnDate" class="form-control"/></td>
                            </tr>
                            <tr>
                                <th>Chọn sách</th>
                                <td >
                                    <form method="post" action="">
                                        @csrf
                                        <input type="text" name="bookName" class="form-control" id="bookName" placeholder="Nhập tên sách">
                                        <div id="bookList"></div>
                                        {{-- <button class="btn btn-xs-primary">Tìm</button> --}}
                                    </form>
                                    {{ csrf_field() }}
                                </td>
                            </tr>
                        </table>

                        <button type="submit">Thêm đơn</button>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#bookName').keyup(function() {
        var query = $(this).val();
        if(query != "") {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('searchWhenAddBorrowing') }}",
                method: "POST",
                data:{query: query, _token:_token},
                success:function(data) {
                    $('#bookList').fadeIn();
                    $('#bookList').html(data);
                }
            })
        } else {
            $('#bookList').html("");
        }
    });

    $(document).on('click', 'li', function() {
        $('#bookName').val($(this).text());
        $('#bookList').fadeOut();
    });
});
</script>