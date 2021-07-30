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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="books-full-width">
                <div class="container">
                    <!-- Start: Search Section -->
                    <!-- End: Search Section -->
                    <div class="users-list-view">
                        <h3>Book Rent List</h3>

                        <ul>
                            <?php
                            $usern = "r";
                            $rol = "r";
                            $mail = "r";
                            $insc = "r";
                            $desc = "r"; 
                            ?>
                            @if(count($borrow)>0)
                            <form>
                                <table class="table table-hover">
                                    <?php $bookname = "bookname";
                                $borrower = "borrower";
                                $quantityx = "quantity";
                                $brdate = "brdate";
                                $redate = "redate";  
                                $desc = "d"; 
                                $insc = "i";?>
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sách
                                                <a href="{{route('books_rented', compact('bookname', 'desc'))}}"><i
                                                        class="fas fa-angle-double-down"></i></a>
                                                <a href="{{route('books_rented', compact('bookname', 'insc'))}}"><i
                                                        class="fas fa-angle-double-up"></i></a></th>
                                            <th>Người mượn
                                                <a href="{{route('books_rented', compact('borrower', 'desc'))}}"><i
                                                        class="fas fa-angle-double-down"></i></a>
                                                <a href="{{route('books_rented', compact('borrower', 'insc'))}}"><i
                                                        class="fas fa-angle-double-up"></i></a>
                                            </th>
                                            <th>Số lượng mượn
                                                <a href="{{route('books_rented', compact('quantityx', 'desc'))}}"><i
                                                        class="fas fa-angle-double-down"></i></a>
                                                <a href="{{route('books_rented', compact('quantityx', 'insc'))}}"><i
                                                        class="fas fa-angle-double-up"></i></a>
                                            </th>
                                            <th>Ngày mượn
                                                <a href="{{route('books_rented', compact('brdate', 'desc'))}}"><i
                                                        class="fas fa-angle-double-down"></i></a>
                                                <a href="{{route('books_rented', compact('brdate', 'insc'))}}"><i
                                                        class="fas fa-angle-double-up"></i></a>
                                            </th>
                                            <th>Ngày hẹn trả
                                                <a href="{{route('books_rented', compact('redate', 'desc'))}}"><i
                                                        class="fas fa-angle-double-down"></i></a>
                                                <a href="{{route('books_rented', compact('redate', 'insc'))}}"><i
                                                        class="fas fa-angle-double-up"></i></a>
                                            </th>
                                            <th>Trạng thái</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @forelse ($borrow as $b)
                                        <?php
                                        $id = $b->id;
                                        
                                        $i++;
                                        ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$b->name}}</td>
                                            <td>{{$b->username}}</td>
                                            <td>{{$b->quantity}}</td>
                                            <td>{{$b->borrowDate }}</td>
                                            <td>{{$b->returnDate }}</td>
                                            <td>{{$b->returned}}</td>

                                            <td>
                                                <a href="{{ route('rents_byId', compact('id')) }}">
                                                    <i class="fa fa-pen" aria-hidden="true" style="color: blue"></i>
                                                </a>
                                                <a rel="{{ $id }}" href="javascript:" id="deleteButton">
                                                    <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <td>No data</td>
                                        @endforelse

                                    </tbody>

                                </table>
                            </form>
                            @else
                            <br>
                            <div>No users registered</div>
                            @endif
                        </ul>
                    </div>
                    
                    <!--navigation-->
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
                    <!--end navigation-->
                </div>
                
            </div>
        </main>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js">
</script>
<script>
    $(document).ready(function() {
       $('a[id=deleteButton]').click(function() {
           var id = $(this).attr('rel');
           
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
                window.location.href = "/delete_rented/" + id;
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        })
    })
</script>

@endsection