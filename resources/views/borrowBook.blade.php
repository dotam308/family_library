@extends('mainLayout')

@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Books & Media Listing</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Home</a></li>
                <li>Books & Media</li>
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
                    <h3>Borrow book</h3>
                    <br>
                    <form method="POST"  enctype="multipart/form-data">
                        @csrf
                        <table class="table table-hover">
                            
                            <div class="post-thumbnail">
                                <div class="book-list-icon blue-icon"></div>
                                <img src="/storage/{{ $book->image }}"
                                    alt="Book Image">
                                <br><br>
                            </div>

                            <tr>
                                <p><strong>Book name:</strong> {{ $book->name }}</p>
                            </tr>
                            <tr>
                                <p><strong>Author:</strong> {{ $book->author }}</p>
                            </tr>
                            <tr>
                                <p><strong>Borrow date:</strong> {{ date("d-m-Y") }}</p>
                            </tr>
                            <tr>
                                <p><strong>Quantity in stock:</strong> {{ $book->copies }}</p>
                            </tr>
                            <br><br>
                            
                            <tr>
                                <th>Quantity borrow</th>
                                <td><input type="text" name="quantity" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Return date: </th>
                                <td><input type="date" name="returnDate" class="form-control"></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary">Borrow</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

</div>
@endsection