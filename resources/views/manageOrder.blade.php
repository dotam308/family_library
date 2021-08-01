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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
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
                        <?php
                        $dc = "r";$bn = "r";$au = "r";$un = "r";$qua = "r";
                                $bd = "r";$rd="r";$insc = "r";$desc = "r"; 
                        if (empty($status)) {
                            $routeName = 'borrowingOrders';
                        } else{
                            $routeName = 'waitingOrders';    
                        }
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>DDC code
                                    <a href="{{route($routeName, compact('dc','desc'))}}" id="dc_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('dc','insc'))}}" id="dc_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Title
                                    <a href="{{route($routeName, compact('bn','desc'))}}" id="bn_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('bn','insc'))}}" id="bn_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Author
                                    <a href="{{route($routeName, compact('au','desc'))}}" id="au_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('au','insc'))}}" id="au_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Username
                                    <a href="{{route($routeName, compact('un','desc'))}}" id="un_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('un','insc'))}}" id="un_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>borrowed quantity
                                    <a href="{{route($routeName, compact('qua','desc'))}}" id="qua_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('qua','insc'))}}" id="qua_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>borrowed date
                                    <a href="{{route($routeName, compact('bd','desc'))}}" id="bd_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('bd','insc'))}}" id="bd_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>return date
                                    <a href="{{route($routeName, compact('rd','desc'))}}" id="rd_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('rd','insc'))}}" id="rd_insc"><i class="fas fa-angle-double-up"></i></a></th>
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
                <!--navigation-->
                @include('includes.navigation', ['data'=>$orders])
                <!--end navigation-->
            </div>
        </main>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $url = window.location.href;
        if ($url == "http://127.0.0.1:8000/waitingOrders?dc=r&desc=r") {
            document.getElementById("dc_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?dc=r&insc=r") {
            document.getElementById("dc_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?bn=r&desc=r") {
            document.getElementById("bn_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?bn=r&insc=r") {
            document.getElementById("bn_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?au=r&desc=r") {
            document.getElementById("au_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?au=r&insc=r") {
            document.getElementById("au_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?un=r&desc=r") {
            document.getElementById("un_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?un=r&insc=r") {
            document.getElementById("un_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?qua=r&desc=r") {
            document.getElementById("qua_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?qua=r&insc=r") {
            document.getElementById("qua_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?bd=r&desc=r") {
            document.getElementById("bd_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?bd=r&insc=r") {
            document.getElementById("bd_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?rd=r&desc=r") {
            document.getElementById("rd_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/waitingOrders?rd=r&insc=r") {
            document.getElementById("rd_insc").style.display = 'none';
        }
         $url = window.location.href;
        if ($url == "http://127.0.0.1:8000/borrowingOrders?dc=r&desc=r") {
            document.getElementById("dc_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?dc=r&insc=r") {
            document.getElementById("dc_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?bn=r&desc=r") {
            document.getElementById("bn_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?bn=r&insc=r") {
            document.getElementById("bn_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?au=r&desc=r") {
            document.getElementById("au_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?au=r&insc=r") {
            document.getElementById("au_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?un=r&desc=r") {
            document.getElementById("un_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?un=r&insc=r") {
            document.getElementById("un_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?qua=r&desc=r") {
            document.getElementById("qua_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?qua=r&insc=r") {
            document.getElementById("qua_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?bd=r&desc=r") {
            document.getElementById("bd_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?bd=r&insc=r") {
            document.getElementById("bd_insc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?rd=r&desc=r") {
            document.getElementById("rd_desc").style.display = 'none';
        }
        if ($url == "http://127.0.0.1:8000/borrowingOrders?rd=r&insc=r") {
            document.getElementById("rd_insc").style.display = 'none';
        }
    })
</script>

@endsection