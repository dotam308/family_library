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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Số thứ tự</th>
                                    <th>Mã DDC</th>
                                    <th>Tên sách</th>
                                    <th>Tác giả</th>
                                    <th>Thể loại</th>
                                    <th>Số lượng mượn</th>
                                    <th>Ngày mượn</th>
                                    <th>Ngày hẹn trả</th>
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