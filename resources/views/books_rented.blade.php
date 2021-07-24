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
<h3>Book Rent List</h3>
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
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($borrow as $b)
                <?php
                $id = $b->id;
                ?>
                    <tr>
                        <td>{{ $b->name }}</td>
                        <td>{{$b->username}}</td>
                        <td>{{ $b->quantity }}</td>
                        <td>{{ $b->borrowDate }}</td>
                        <td>{{ $b->returnDate }}</td>
                        <td>{{ $b->returned}}</td>
                        </td>
                        <td>
                            <a href="{{ route('delete_rented', compact('id')) }}"><i class="fa fa-trash"></i></a>
                            <a href="{{ route('rents_byId', compact('id')) }}"><i class="fa fa-edit"></i></a>
                        </td>    
                    </tr>
                @empty
                <td>No data</td>
                @endforelse
                
            </tbody>

        </table>
    </form>
@endsection