@extends("mainLayout")
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Thống kê</h2>
            <span class="underline center"></span>
            <p class="lead">Thống kê theo lượt mượn</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Thống kê</a></li>
                <li>Lượt mượn</li>
                
            </ul>
        </div>
    </div>
</section>
@endsection
@section('content')
<section class="features">
    <div class="container">
        <ul>
            <li class="bg-yellow">
                <div class="feature-box">
                    <i class="yellow"></i>
                    <p3>Số lượng lượt mượn<p3>
                    <p><strong><big>{{$rentTime}}</big></strong> lượt</p>
                    
                </div>
            </li>
            <li class="bg-light-green">
                <div class="feature-box">
                    <i class="light-green"></i>
                    <p3>Ngày có số lượt mượn nhiều nhất là:    <strong><big>{{$mostBookRentDay[0]->borrowDate}}</big></strong> với <strong><big>{{$mostBookRentDay[0]->totalforEach1}}</big></strong> lượt mượn</p3>
                </div>
            </li>
            <li class="bg-red">
                <div class="feature-box">
                    <i class="red"></i>
                    <p3>Ngày có số lượt mượn ít nhất là:    <strong><big>{{$mostRentDay[0]->borrowDate}}</big></strong> với <strong><big>{{$mostRentDay[0]->totalforEach1}}</big></strong> lượt mượn </p3>
             </div>
            </li>
        </ul>
    </div>
</section>
@endsection