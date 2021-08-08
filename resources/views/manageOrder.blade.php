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
                        $dc = "r";$bn = "r";$au = "r";$un = "r";$qua = "r";$page="r";
                                $bd = "r";$rd="r";$insc = "r";$desc = "r"; 
                        if (empty($status)) {
                            $routeName = 'borrowingOrders';
                        } else{
                            $routeName = 'waitingOrders';    
                        }
                        if (isset($_GET['page'])) {
                            $page=$_GET['page'];
                        }
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>DDC code
                                        <input type="hidden" name="base-url" id="base-url" value="{{url('/')}}">
                                    <a href="{{route($routeName, compact('dc','desc','page'))}}" id="dc_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['dc']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('dc','insc','page'))}}" id="dc_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['dc']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Title
                                    <a href="{{route($routeName, compact('bn','desc','page'))}}" id="bn_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['bn']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('bn','insc','page'))}}" id="bn_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['bn']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Author
                                    <a href="{{route($routeName, compact('au','desc','page'))}}" id="au_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['au']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('au','insc','page'))}}" id="au_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['au']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Username
                                    <a href="{{route($routeName, compact('un','desc','page'))}}" id="un_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['un']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('un','insc','page'))}}" id="un_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['un']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>borrowed quantity
                                    <a href="{{route($routeName, compact('qua','desc','page'))}}" id="qua_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['qua']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('qua','insc','page'))}}" id="qua_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['qua']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>borrowed date
                                    <a href="{{route($routeName, compact('bd','desc','page'))}}" id="bd_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['bd']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('bd','insc','page'))}}" id="bd_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['bd']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>return date
                                    <a href="{{route($routeName, compact('rd','desc','page'))}}" id="rd_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['rd']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('rd','insc','page'))}}" id="rd_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['rd']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                @endphp
                                @foreach ($orders as $order)
                                
                                        @php
                                            $i++;
                                            $bookId = $order->bookId;
                                            $id = $bookId;
                                            $borrowId = $order->borrowingId;
                                        @endphp
                                    <tr>
                                        <td>{{ abs($i) }}</td>
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
