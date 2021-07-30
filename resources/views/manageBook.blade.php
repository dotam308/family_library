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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
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
                                <?php
                                $dc = "r";$bn = "r";$au = "r";$ge = "r";$pub = "r";$trans = "r";$coun = "r";$qua = "r";
                                $pri = "r";$insc = "r";$desc = "r";
                                ?>
                                <tr>
                                    <th>Số thứ tự/Order</th>
                                    <th>Mã DDC/DDC
                                    <a href="{{route('manageBooks', compact('dc','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('dc','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Tên sách/Title
                                    <a href="{{route('manageBooks', compact('bn','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('bn','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Tác giả/Author
                                    <a href="{{route('manageBooks', compact('au','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('au','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Thể loại/Genre
                                    <a href="{{route('manageBooks', compact('ge','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('ge','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Nhà sản xuất/Publisher
                                    <a href="{{route('manageBooks', compact('pub','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('pub','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Người dịch/Translator
                                    <a href="{{route('manageBooks', compact('trans','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('trans','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Quốc gia/Country
                                    <a href="{{route('manageBooks', compact('coun','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('coun','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Số sách trong kho/Copies
                                    <a href="{{route('manageBooks', compact('qua','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('qua','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Giá/Price
                                    <a href="{{route('manageBooks', compact('pri','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('pri','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
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
                                                <i class="fa fa-pen" aria-hidden="true" style="color: blue"></i>
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