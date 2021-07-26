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
            <div class="books-full-width">
                <div class="container">
                    <form>
                        <h3>Danh sách các loại sách</h3>
                        <div class="row">
                            <div class="col text-right">
                                <a type="button" class="btn btn-primary" href="{{ route('addBook') }}">Thêm sách</a>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Số thứ tự/Order</th>
                                    <th>Mã DDC/DDC</th>
                                    <th>Tên sách/Title</th>
                                    <th>Tác giả/Author</th>
                                    <th>Thể loại/Genre</th>
                                    <th>Nhà sản xuất/Publisher</th>
                                    <th>Người dịch/Translator</th>
                                    <th>Quốc gia/Country</th>
                                    <th>Số sách trong kho/Copies</th>
                                    <th>Giá/Price</th>
                                    <th>Ảnh/Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($books as $book)
                                
                                        @php
                                            $i++;
                                        @endphp
                                    <tr>
                                        <input type="hidden" class="deleteIdButton" value="{{ $book->id }}"/>
                                        <td>{{ $i }}</td>
                                        <td>{{ $book->ddcCode }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->genre }}</td>
                                        <td>{{ $book->publisher }}</td>
                                        <td>{{ $book->translator }}</td>
                                        <td>{{ $book->country }}</td>
                                        <td>{{ $book->copies }}</td>
                                        <td>{{ $book->price }}</td>
                                        <td>
                                            <img src="/storage/{{ $book->image }}" alt="image"/>
                                        </td>
                                        <td>
                                            <?php $id = $book->id; ?>
                                            <a href="{{ route('editBook', compact('id')) }}" id="editButton" >
                                                <i class="fa fa-pencil" aria-hidden="true" style="color: blue"></i>
                                            </a>
                                            <a rel="{{ $id }}" rel1= "book" href="javascript:" id="deleteButton" class="deleteButton">
                                                <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                
                        </table>
                    </form>
                </div>
                <nav class="navigation pagination text-center">
                    <h2 class="screen-reader-text">Posts navigation</h2>
                    <div class="nav-links">
                        <a class="prev page-numbers" href="#."><i class="fa fa-long-arrow-left"></i> Previous</a>
                        <a class="page-numbers" href="#.">1</a>
                        <span class="page-numbers current">2</span>
                        <a class="page-numbers" href="#.">3</a>
                        <a class="page-numbers" href="#.">4</a>
                        <a class="next page-numbers" href="#.">Next <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </nav>
            </div>
        </main>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
       $('a[id=deleteButton]').click(function() {
           var id = $(this).attr('rel');
           var deleteFunction = $(this).attr('rel1');
           swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
            },
            function(){
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                window.location.href = "/deleteBook/"+ deleteFunction + "/" + id;
            });
        })
    })
</script>

@endsection