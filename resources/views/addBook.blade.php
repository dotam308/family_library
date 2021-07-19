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
                    <h3>Thêm sách</h3>
                    <br>
                    <form method="POST"  enctype="multipart/form-data">
                        @csrf
                        <table class="table table-hover">
                            <tr>
                                <th>DdcCode</th>
                                <td><input type="text" name="ddcCode" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" name="name" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th>Author</th>
                                <td><input type="text" name="author" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Genre</th>
                                <td><input type="text" name="genre" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Publisher</th>
                                <td><input type="text" name="publisher" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Translator</th>
                                <td><input type="text" name="translator" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td><input type="text" name="country" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Review</th>
                                <td><input type="text" name="review" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Copies</th>
                                <td><input type="text" name="copies" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><input type="text" name="price" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><input type="file" name="img" class="form-control"></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

</div>
@endsection