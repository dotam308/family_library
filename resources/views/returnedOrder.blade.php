@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Đơn hàng thành công</h2>
            <span class="underline center"></span>
            {{-- <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p> --}}
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Đơn hàng</a></li>
                <li>Đơn hàng thành công</li>
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
                        <br>
                        <br>
                        @if (count($orders) == 0)
                            <p>Không có đơn hàng</p>
                        @else
                        <?php
                        $dc = "r";$bn = "r";$au = "r";$un = "r";$qua = "r";$page="r";
                                $bd = "r";$rd="r";$insc = "r";$desc = "r"; 
                        
                        $routeName = 'returnedOrders';

                        if (isset($_GET['page'])) {
                            $page=$_GET['page'];
                        }
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã DDC
                                        <input type="hidden" name="base-url" id="base-url" value="{{url('/')}}">
                                    <a href="{{route($routeName, compact('dc','desc','page'))}}" id="dc_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['dc']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('dc','insc','page'))}}" id="dc_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['dc']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Tiêu đề
                                    <a href="{{route($routeName, compact('bn','desc','page'))}}" id="bn_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['bn']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('bn','insc','page'))}}" id="bn_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['bn']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Tác giả
                                    <a href="{{route($routeName, compact('au','desc','page'))}}" id="au_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['au']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('au','insc','page'))}}" id="au_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['au']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Username
                                    <a href="{{route($routeName, compact('un','desc','page'))}}" id="un_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['un']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('un','insc','page'))}}" id="un_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['un']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    {{-- <th>Số lượng mượn
                                    <a href="{{route($routeName, compact('qua','desc','page'))}}" id="qua_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['qua']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('qua','insc','page'))}}" id="qua_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['qua']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th> --}}
                                    <th>Ngày mượn
                                    <a href="{{route($routeName, compact('bd','desc','page'))}}" id="bd_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['bd']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('bd','insc','page'))}}" id="bd_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['bd']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Ngày dự định trả
                                    <a href="{{route($routeName, compact('rd','desc','page'))}}" id="rd_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['rd']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('rd','insc','page'))}}" id="rd_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['rd']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Trạng thái</th>
                                    <th>Ngày trả sách</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $c = $orders->currentPage();
                                    if (isset($_GET['desc'])) {
                                        $i = -($orders->total()+1);
                                        $i += 10*($c-1);
                                    } else {
                                        $i = 10*($c-1);
                                    }
                                    $o=0;
                                @endphp
                                @foreach ($orders as $order)
                                
                                        @php
                                            $i++;
                                            $o++;
                                            $bookId = $order->bookId;
                                            $id = $bookId;
                                            $borrowId = $order->borrowingId;
                                        @endphp
                                    <tr>
                                        <td>{{ abs($o + ($c-1)*10) }}</td>
                                        <td>{{ $order->ddcCode }}</td>
                                        <td><a href="{{ route('book_detail_byId', compact('id')) }}">{{ $order->name }}</a></td>
                                        <td>{{ $order->author }}</td>
                                        <td>{{ $order->userName }}</td>
                                        {{-- <td>{{ $order->quantity }}</td> --}}
                                        <td>{{ $order->borrowDate }}</td>
                                        <td>{{ $order->returnDate }}</td>
                                        <td>Đã trả</td>
                                        @php
                                            $date=date_create($order->bookReturnedAt);
                                            $date = date_format($date,"Y-m-d");
                                        @endphp
                                        <td>
                                            {{ $date}}
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
