@extends('mainLayout')

@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Users Listing</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Home</a></li>
                <li>Users</li>
            </ul>
        </div>
    </div>
</section>
@endsection
@section('content')
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="booksmedia-detail-main">
                <div class="container">
                    <table class="table table-hover">
                    <div id="form-heading" class="form-heading">
                        <br>
                        <h3>PROFILE</h3>
                        <br>
                    </div>
                        <table class="table table-hover">
                            <tr>
                                <th>Full name</th>
                                <td>{{$info->name}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$info->address}}</td>
                            </tr>
                            <tr>
                                <th>Contact number</th>
                                <td>{{$info->contactNumber}}</td>
                            </tr>
                        </table>
                    <a type="button" class="btn btn-back" href="{{route('index')}}">Quay lại</a>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection