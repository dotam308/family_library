@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Orders list</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Home</a></li>
                <li>Order</li>
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
                        <h3>{{ empty($status) ? 'Borrowing' : 'Waiting' }} orders</h3>
                        <br>
                        <br>
                        @if (count($orders) == 0)
                            <p>There is no data</p>
                        @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>DDC code</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Username</th>
                                    <th>borrowed quantity</th>
                                    <th>borrowed date</th>
                                    <th>return date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($orders as $order)
                                
                                        @php
                                            $i++;
                                            $bookId = $order->bookId;
                                            $id = $bookId;
                                            $borrowId = $order->borrowingId;
                                        @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $order->ddcCode }}</td>
                                        <td><a href="{{ route('book_detail_byId', compact('id')) }}">{{ $order->name }}</a></td>
                                        <td>{{ $order->author }}</td>
                                        <td>{{ $order->userName }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->borrowDate }}</td>
                                        <td>{{ $order->returnDate }}</td>
                                        <td>{{ $order->returned }}</td>
                                        <td>
                                            @if ($order->returned == 'waiting')
                                                <a type="button" class="btn btn-primary" href="{{ route('tookBook', compact('borrowId', 'bookId')) }}">da lay sach</a>
                                            @else
                                                <a type="button" class="btn btn-primary" href="{{ route('returnBook', compact('borrowId', 'bookId')) }}">da tra sach</a>
                                            @endif
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