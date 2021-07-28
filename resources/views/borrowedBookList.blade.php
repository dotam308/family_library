@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Books</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Home</a></li>
                <li>Check</li>
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
                        <h3>{{ empty($returned) ? 'Borrowing' : 'Returned' }} books list</h3>
                        <br>
                        <br>
                        @if (count($books) == 0)
                            <p>There is no data</p>
                        @else
                        <?php
                        $dc = "r";$bn = "r";$au = "r";$ge = "r";$qua = "r";
                                $bd = "r";$rd="r";$insc = "r";$desc = "r"; 
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>

                                    <th>Order</th>
                                    <th>DDC code
                                        <a href="{{route('borrowedBooks', compact('dc','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('dc','insc'))}}"><i class="fas fa-angle-double-up"></i></a>
                                    </th>
                                    <th>Title
                                    <a href="{{route('borrowedBooks', compact('bn','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('bn','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Author
                                    <a href="{{route('borrowedBooks', compact('au','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('au','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Genre
                                    <a href="{{route('borrowedBooks', compact('ge','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('ge','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>borrowed quantity
                                    <a href="{{route('borrowedBooks', compact('qua','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('qua','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>borrowed date
                                    <a href="{{route('borrowedBooks', compact('bd','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('bd','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>return date
                                    <a href="{{route('borrowedBooks', compact('rd','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('borrowedBooks', compact('rd','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Status</th>
                                    @if (isset($returned))
                                        <th>Book returned at</th>
                                    @endif
                                    <th>Image</th>
                                    @if (!isset($returned))
                                        <th>Action</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($books as $book)
                                
                                        @php
                                            $i++;
                                            $id = $book->id;
                                        @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $book->ddcCode }}</td>
                                        <td><a href="{{ route('book_detail_byId', compact('id')) }}">{{ $book->name }}</a></td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->genre }}</td>
                                        <td>{{ $book->quantity }}</td>
                                        <td>{{ $book->borrowDate }}</td>
                                        <td>{{ $book->returnDate }}</td>
                                        <td>{{ $book->returned }}</td>
                                        @if (isset($returned))
                                            @php
                                                $date=date_create($book->bookReturnedAt);
                                                $date = date_format($date,"Y-m-d");
                                            @endphp
                                            <td>{{ $date }}</td>
                                        @endif

                                        <td>
                                            <img src="/storage/{{ $book->image }}" alt="image"/>
                                        </td>

                                        @if ($book->returned == 'waiting')
                                        @php
                                            $id = $book->borrowId;
                                        @endphp
                                        <td>
                                            <button><a rel="{{ $id }}" href="javascript:" id="deleteButton" style="color: #fff;">Cancel</a></button>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
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
           
           swal({
            title: "Are you sure?",
            text: "This order will be canceled",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            closeOnConfirm: false
            },
            function(){
                window.location.href = "/cancelBorrow/" + id;
            swal("Deleted!", "Your order has been canceled.", "success");
            });
        })
    })
</script>

@endsection
