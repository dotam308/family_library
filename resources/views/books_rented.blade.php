@extends('mainLayout')

@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Manage Listing</h2>
            <span class="underline center"></span>
            <p class="lead">Manage Books Rented Page.</p>
        </div>
        <div class="breadcrumb">    
            <ul>
                <li><a href="index-2.html">Home</a></li>
                <li>Books Rented</li>
            </ul>
        </div>
    </div>
</section>
@endsection

@section('content')
<form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tên sách</th>
                    <th>Người mượn</th>
                    <th>Số lượng mượn</th>
                    <th>Ngày mượn</th>
                    <th>Ngày hẹn trả</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrow as $b)
                    <tr>
                        <td>{{ $b->name }}</td>
                        <td>{{$b->username}}</td>
                        <td>{{ $b->quantity }}</td>
                        <td>{{ $b->borrowDate }}</td>
                        <td>{{ $b->returnDate }}</td>
                        <td>
                             @if ($b->returned == 'false')
                                 <p><strong>Chưa trả</strong><p>
                             @else 
                                 <p><strong>Đã trả</strong></p>
                             @endif
                        </td>    
                    </tr>
                @endforeach
                
            </tbody>

        </table>
    </form>
@endsection