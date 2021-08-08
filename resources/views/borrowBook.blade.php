@extends('mainLayout')

@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Sách mượn</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="#">Quản lý</a></li>
                <li>Sách mượn</li>
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
                    <h3>Danh sách</h3>
                    <br>
                    <form method="POST"  enctype="multipart/form-data">
                        @csrf
                        <table class="table table-hover">
                            
                            <div class="post-thumbnail">
                                <img src="/storage/{{ $book->image }}"
                                    alt="Book Image">
                                <br><br>
                            </div>

                            <tr>
                                <p><strong>Tiêu đề:</strong> {{ $book->name }}</p>
                            </tr>
                            <tr>
                                <p><strong>Tác giả:</strong> {{ $book->author }}</p>
                            </tr>
                            <tr>
                                <p><strong>Ngày mượn:</strong> {{ date("d-m-Y") }}</p>
                            </tr>
                            <tr>
                                <p><strong>Quantity in stock:</strong> {{ $book->copies }}</p>
                            </tr>
                            @if($book->copies == 0)
                                <div style="font-size: 20px; color: #f00;">*This book is out of stock</div>
                            @endif
                            <br><br>
                            
                            <tr>
                                <th>Quantity borrow</th>
                                @if(isset($_POST['quantity']))
                                <td><input type="text" name="quantity" class="form-control" value="{{ $_POST['quantity']; }}"></td>
                                @else
                                    <td><input type="text" name="quantity" class="form-control"></td>
                                @endif
                            </tr>
                            <tr>
                                <th>Hạn trả: </th>
                                @if (isset($_POST['returnDate']))
                                    <td><input type="date" name="returnDate" class="form-control" value="{{ $_POST['returnDate'] }}"></td>
                                @else
                                    <td><input type="date" name="returnDate" class="form-control"></td>
                                @endif
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary">Mượn</button>
                        <?php $id = Request::get('id'); ?>
                        <a type="button" class="btn btn-primary" href="{{ route('book_detail_byId', compact('id')) }}" style="margin: 100px; color: #fff;">Cancel</a>
                    </form>
                </div>
            </div>
        </main>
    </div>

</div>
@endsection