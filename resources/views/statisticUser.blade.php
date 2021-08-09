@extends("mainLayout")
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Thống kê</h2>
            <span class="underline center"></span>
            <p class="lead">Thống kê theo người dùng</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Thống kê</a></li>
                <li>Người dùng</li>
                
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
                    <p3>Số lượng người dùng trong thư viện:<p3><br>
                    <p1><strong><big>{{$userquantity}}</big></strong> người</p1><br>
                    <br>
                    
                </div>
            </li>
            <li class="bg-light-green">
                <div class="feature-box">
                    <i class="light-green"></i>
                    <p3><strong><big>3</big></strong> người đang mượn nhiều nhất là: </p3><br>
        <?php $i=0;?>
        @forelse ($usuallyUser as $u)
        <?php if ($i<3) {
            echo $u->username."\n với " .$u->totalforEach . " quyển sách.";
            $i++;
        ?>
        <br>
            <?php
        }?>
        @empty
        @endforeach
        
        <br>
                </div>
            </li>
            <li class="bg-red">
                <div class="feature-box">
                    <i class="red"></i>
                    <p3>Có <strong><big>{{$quantityActive}}</big></strong> người đã mượn sách trong thư viện</p3>
             </div>
            </li>
        </ul>
    </div>
</section>

@endsection