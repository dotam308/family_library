@extends('mainLayout')

@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Thêm sách</h2>
            <span class="underline center"></span>
            {{-- <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p> --}}
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Quản lý</a></li>
                <li>Sách</li>
            </ul>
        </div>
    </div>
</section>
@endsection

@section('content')
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="booksmedia-detail-main">
                <div class="container">
                    <br>
                    {{-- <h3>Thêm sách</h3> --}}
                    <br>
                    <form method="POST"  enctype="multipart/form-data">
                        @csrf
                        <table class="table table-hover">
                            <tr>
                                <th>Tên sách</th>
                                <td><input type="text" name="name" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th>Tác giả</th>
                                <td><input type="text" name="author" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Thể loại</th>
                                <td><input type="text" name="genre" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Mã DDC</th>
                                <td>
                                    <div class="form-control">
                                        <select name="level1" id="level1" data-dependent="level2" class="dynamic">
                                            <option value="">Chọn lớp</option>
                                            @foreach ($level1 as $key => $value)
                                                <option value="{{ $key }}">{{$value}}</option>
                                            @endforeach
                                        </select>
    
                                        <select name="level2" id="level2">
                                            <option value="">Chọn phân lớp</option>
                                        </select>
                                    </div>
                                    {{ csrf_field() }}
                                </td>
                            </tr>
                            <tr>
                                <th>Nhà xuất bản</th>
                                <td><input type="text" name="publisher" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Dịch giả</th>
                                <td><input type="text" name="translator" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Quốc gia</th>
                                <td><input type="text" name="country" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Review</th>
                                <td><input type="text" name="review" class="form-control"></td>
                            </tr>
                            {{-- <tr>
                                <th>Copies</th>
                                <td><input type="text" name="copies" class="form-control"></td>
                            </tr> --}}
                            <tr>
                                <th>Giá</th>
                                <td><input type="text" name="price" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Ảnh</th>
                                <td>
                                    <input type="file" name="img" class="form-control">
                                </td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <a type="button" class="btn btn-back" href="{{ route('manageBooks') }}">Quay lại</a>
                    </form>
                </div>
            </div>
        </main>
    </div>

</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.dynamic').change(function() {
            if($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('addBooklevel2') }}",
                    method: "POST",
                    data:{select:select, value:value, _token: _token,
                    dependent:dependent},
                    success:function(result) {
                        $('#'+dependent).html(result);
                    }
                });
            } else {
                var dependent = $(this).data('dependent');
                $('#'+dependent).html("");
            }
        });
    });
</script>