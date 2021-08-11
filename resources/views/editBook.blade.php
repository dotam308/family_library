@extends('mainLayout')

@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Cập nhật sách</h2>
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
                    {{-- <h3>Cập nhật sách</h3> --}}
                    <br>
                    <form method="POST"  enctype="multipart/form-data">
                        @csrf
                        <table class="table table-hover">
                            <tr>
                                <th>Tên sách</th>
                                <td><input type="text" name="name" class="form-control" value="{{ $book->name }}" ></td>
                            </tr>
                            <tr>
                                <th>Tác giả</th>
                                <td><input type="text" name="author" class="form-control" value="{{ $book->author }}"></td>
                            </tr>
                            <tr>
                                <th>Thể loại</th>
                                <td><input type="text" name="genre" class="form-control" value="{{ $book->genre }}"></td>
                            </tr>
                            <tr>
                                <th>DdcCode</th>
                                {{-- <td><input type="text" name="ddcCode" class="form-control"></td> --}}
                                <td>
                                    <div class="form-control">
                                        <select name="level1" id="level1" data-dependent="level2" class="dynamic">
                                            @if ($selected1 == "")
                                                <option value="" selected>Chọn lớp</option>
                                            @endif
                                            @foreach ($level1 as $key => $value)
                                                @if ($key == $selected1)
                                                    <option value="{{ $key }}" selected>{{$value}}</option>
                                                @else
                                                    <option value="{{ $key }}">{{$value}}</option>
                                                @endif
                                            @endforeach
                                        </select>
    
                                        <select name="level2" id="level2">
                                            @if ($selected2 == "")
                                                <option value="" selected>Chọn phân lớp</option>
                                            @endif
                                            @foreach ($level2 as $key => $value)
                                                @if ($key == $selected2)
                                                    <option value="{{ $key }}" selected>{{$value}}</option>
                                                @else
                                                    <option value="{{ $key }}">{{$value}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    {{ csrf_field() }}
                                </td>
                            </tr>
                            <tr>
                                <th>Nhà xuất bản</th>
                                <td><input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}"></td>
                            </tr>
                            <tr>
                                <th>Dịch giả</th>
                                <td><input type="text" name="translator" class="form-control" value="{{ $book->translator }}"></td>
                            </tr>
                            <tr>
                                <th>Quốc gia</th>
                                <td><input type="text" name="country" class="form-control" value="{{ $book->country }}"></td>
                            </tr>
                            <tr>
                                <th>Review</th>
                                <td><input type="text" name="review" class="form-control" value="{{ $book->review }}"></td>
                            </tr>
                            {{-- <tr>
                                <th>Copies</th>
                                <td><input type="text" name="copies" class="form-control" value="{{ $book->copies }}"></td>
                            </tr> --}}
                            <tr>
                                <th>Giá</th>
                                <td><input type="text" name="price" class="form-control" value="{{ $book->price }}"></td>
                            </tr>
                            <tr>
                                <th>Ảnh</th>
                                <td>
                                    <img class="small-image" src="/storage/{{ $book->image }}">
                                    <input type="file" name="img" class="form-control">
                                </td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a type="button" class="btn btn-back" href="{{ route('manageBooks') }}">Quay lại</a>
                    </form>
                </div>
            </div>
        </main>
    </div>

</div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

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
                })
            } else {
                var dependent = $(this).data('dependent');
                $('#'+dependent).html("");
            }
        });
    });
</script>