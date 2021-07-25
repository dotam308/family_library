@extends('mainLayout')

@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Manage Listing</h2>
            <span class="underline center"></span>
            <p class="lead">Manage Books Rented Page.</th>
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
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="booksmedia-detail-main">
                <div class="container">
                    <br>
                    <h3>Manage Book Rent</h3>
                    <br>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-hover">
                            <tr>
                                <th><strong>ID:</strong></th>
                                <td><input type="text" name="id" class="form-control" value={{$borrow->id}} disabled></td>
                            </tr>
                           
                            <tr>
                                <th><strong>Tên sách:</strong></th>
                                <td><input type="text" name="name" class="form-control" value={{$borrow->name}} disabled></td>
                            </tr>
                            <tr>
                                <th><strong>Người mượn:</strong></th>
                                <td><input type="text" name="username" class="form-control" value={{$borrow->username}} disabled></td>
                            </tr>
                            <tr>
                                <th><strong>Số lượng mượn:</strong></th>
                                <td><input type="text" name="quantity" class="form-control" value="{{$borrow->quantity}}"></td>
                            </tr>
                            
                            <tr>
                                <th><strong>Ngày mượn:</strong></th>
                                <td><input type="text" name="borrowDate" class="form-control" value="{{ $borrow->borrowDate }}"></td>
                            </tr>
                            
                            <tr>
                                <th><strong>Ngày hẹn trả:</strong></th>
                                <td><input type="text" name="returnDate" class="form-control" value="{{ $borrow->returnDate }}"></td>
                            </tr>
                            
                            <tr>
                                <th><strong>Trạng thái:</strong></th>
                                <td><input type="text" name="status" class="form-control" value="{{ $borrow->returned }}"></td>
                            </tr>
                            
                            <tr>
                                <th><strong>Update:</strong> {{ $borrow->updated_at }}</th>
                                <td></td>
                            </tr>
                        </table>
                            <br><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

</div>
@endsection