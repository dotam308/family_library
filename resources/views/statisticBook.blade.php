@extends("mainLayout")
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Thống kê</h2>
            <span class="underline center"></span>
            <p class="lead">Thống kê theo sách</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Thống kê</a></li>
                <li>Sách</li>
                
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
                    <p3>Số lượng sách trong thư viện<p3>
                    <p><strong><big>{{$quantityBook}}</big></strong> quyển sách</p>
                    <p>Trong đó: <strong><big>{{$borrowBook}}</big></strong> quyển sách đang được mượn</p>
                </div>
            </li>
            <li class="bg-light-green">
                <div class="feature-box">
                    <i class="light-green"></i>
                    <p3>Có tất cả <strong><big>{{$booktype}}</big></strong> thể loại sách khác nhau</p3>
                    <p>Bao gồm: <?php $i = 0; foreach($book as $b) {
                            if($i<3){ $i++;
                        echo $b->genre . ",  ";}
                       
                    }
                 echo "...";?></p>
                </div>
            </li>
            <li class="bg-violet">
                <div class="feature-box">
                    <i class="violet"></i>
                    <p3>Có tất cả <strong><big>{{$author}}</big></strong> tác giả</p3>
                    <p>Bao gồm: <?php $i = 0; foreach($book as $b) {
                            if($i<3){ $i++;
                        echo $b->author . ",  ";}
                       
                    }
                 echo "...";?></p>
                </div>
            </li>
            <li class="bg-red">
                <div class="feature-box">
                    <i class="red"></i>
                    <p3>Sách đến từ <strong><big>{{$country}}</big></strong> đất nước</p3>
                    <p>Bao gồm: <?php $i = 0; foreach($book as $b) {
                            if($i<3){ $i++;
                        echo $b->country . ",  ";}
                       
                    }
                 echo "...";?></p>
             </div>
            </li>
            
            <li class="bg-green">
                <div class="feature-box">
                    <i class="green"></i>
                    <p3>Tổng giá trị sách trong thư viện lên đến <strong><big>{{$totalPrice}}đ</big></strong></p3>
                </div>
            </li>

        </ul>
    </div>
</section>
@endsection