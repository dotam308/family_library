@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Books & Media Listing</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Home</a></li>
                <li>Books & Media</li>
            </ul>
        </div>
    </div>
</section>
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="books-full-width">
                <div class="container">
                    <form>
                        <h3>Danh sách sách {{ empty($returned) ? 'đang mượn' : 'đã trả' }}</h3>
                        <br>
                        <br>
                        @if (count($books) == 0)
                            <p>There is no data</p>
                        @else
                        <?php
                        $dc = "r";$bn = "r";$au = "r";$ge = "r";$qua = "r";
                                $bd = "r";$rd="r";$insc = "r";$desc = "r"; 
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Số thứ tự</th>
                                    <th>Mã DDC
                                        <a href="{{route('borrowedBooks', compact('dc','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('dc','insc'))}}"><i class="fas fa-angle-double-up"></i></a>
                                    </th>
                                    <th>Tên sách
                                    <a href="{{route('borrowedBooks', compact('bn','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('bn','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Tác giả
                                    <a href="{{route('borrowedBooks', compact('au','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('au','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Thể loại
                                    <a href="{{route('borrowedBooks', compact('ge','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('ge','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Số lượng mượn
                                    <a href="{{route('borrowedBooks', compact('qua','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('qua','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Ngày mượn
                                    <a href="{{route('borrowedBooks', compact('bd','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('bd','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Ngày hẹn trả
                                    <a href="{{route('borrowedBooks', compact('rd','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('rd','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Đã trả</th>
                                    <th>Ảnh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($books as $book)
                                
                                        @php
                                            $i++;
                                            $id = $book->id;
                                        @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $book->ddcCode }}</td>
                                        <td><a href="{{ route('book_detail_byId', compact('id')) }}">{{ $book->name }}</a></td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->genre }}</td>
                                        <td>{{ $book->quantity }}</td>
                                        <td>{{ $book->borrowDate }}</td>
                                        <td>{{ $book->returnDate }}</td>
                                        <td>{{ $book->returned }}</td>
                                        <td>
                                            <img src="/storage/{{ $book->image }}" alt="image"/>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </form>
                </div>
                <nav class="navigation pagination text-center">
                    <h2 class="screen-reader-text">Posts navigation</h2>
                    <div class="nav-links">
                        <a class="prev page-numbers" href="#."><i class="fa fa-long-arrow-left"></i> Previous</a>
                        <a class="page-numbers" href="#.">1</a>
                        <span class="page-numbers current">2</span>
                        <a class="page-numbers" href="#.">3</a>
                        <a class="page-numbers" href="#.">4</a>
                        <a class="next page-numbers" href="#.">Next <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </nav>
            </div>
        </main>
    </div>
</div>
@endsection