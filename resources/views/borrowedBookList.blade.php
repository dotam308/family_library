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
                                $bd = "r";$rd="r";$insc = "r";$desc = "r";$bra = "r"; 
                        if (empty($returned)) {
                            $routeName = 'borrowedBooks';
                        } else {
                            $routeName = 'returnedBooks';
                        }
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                        <th>Order</th>
                                        <th>DDC code
                                            <input type="hidden" name="base-url" id="base-url" value="{{url('/')}}">
                                            <a href="{{route($routeName, compact('dc','desc'))}}" id="dc_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('dc','insc'))}}" id="dc_insc"><i class="fas fa-angle-double-up"></i></a>
                                        </th>
                                        <th>Title
                                        <a href="{{route($routeName, compact('bn','desc'))}}" id="bn_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('bn','insc'))}}" id="bn_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                        <th>Author
                                        <a href="{{route($routeName, compact('au','desc'))}}" id="au_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('au','insc'))}}" id="au_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                        <th>Genre
                                        <a href="{{route($routeName, compact('ge','desc'))}}" id="ge_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('ge','insc'))}}" id="ge_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                        <th>borrowed quantity
                                        <a href="{{route($routeName, compact('qua','desc'))}}" id="qua_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('qua','insc'))}}" id="qua_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                        <th>borrowed date
                                        <a href="{{route($routeName, compact('bd','desc'))}}" id="bd_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('bd','insc'))}}" id="bd_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                        <th>return date
                                        <a href="{{route($routeName, compact('rd','desc'))}}" id="rd_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('rd','insc'))}}" id="rd_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                        <th>Status</th>
                                    @if (isset($returned))
                                        <th>Book returned at
                                        <a href="{{route($routeName, compact('bra','desc'))}}" id="bra_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route($routeName, compact('bra','insc'))}}" id="bra_insc"><i class="fas fa-angle-double-up"></i></a></th>
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
                <!--navigation-->
                @include('includes.navigation', ['data'=>$books])
                <!--end navigation-->
            </div>
        </main>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        $url = window.location.href;
        $a=document.getElementById("base-url").value;
        if ($url === $a + "/borrowedBooks?dc=r&desc=r") {
            document.getElementById("dc_desc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?dc=r&insc=r") {
            document.getElementById("dc_insc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?bn=r&desc=r") {
            document.getElementById("bn_desc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?bn=r&insc=r") {
            document.getElementById("bn_insc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?au=r&desc=r") {
            document.getElementById("au_desc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?au=r&insc=r") {
            document.getElementById("au_insc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?ge=r&desc=r") {
            document.getElementById("ge_desc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?ge=r&insc=r") {
            document.getElementById("ge_insc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?qua=r&desc=r") {
            document.getElementById("qua_desc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?qua=r&insc=r") {
            document.getElementById("qua_insc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?bd=r&desc=r") {
            document.getElementById("bd_desc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?bd=r&insc=r") {
            document.getElementById("bd_insc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?rd=r&desc=r") {
            document.getElementById("rd_desc").style.display = 'none';
        }
        if ($url === $a + "/borrowedBooks?rd=r&insc=r") {
            document.getElementById("rd_insc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?dc=r&desc=r") {
            document.getElementById("dc_desc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?dc=r&insc=r") {
            document.getElementById("dc_insc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?bn=r&desc=r") {
            document.getElementById("bn_desc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?bn=r&insc=r") {
            document.getElementById("bn_insc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?au=r&desc=r") {
            document.getElementById("au_desc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?au=r&insc=r") {
            document.getElementById("au_insc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?ge=r&desc=r") {
            document.getElementById("ge_desc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?ge=r&insc=r") {
            document.getElementById("ge_insc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?qua=r&desc=r") {
            document.getElementById("qua_desc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?qua=r&insc=r") {
            document.getElementById("qua_insc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?bd=r&desc=r") {
            document.getElementById("bd_desc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?bd=r&insc=r") {
            document.getElementById("bd_insc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?rd=r&desc=r") {
            document.getElementById("rd_desc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?rd=r&insc=r") {
            document.getElementById("rd_insc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?bra=r&desc=r") {
            document.getElementById("bra_desc").style.display = 'none';
        }
        if ($url === $a + "/returnedBooks?bra=r&insc=r") {
            document.getElementById("bra_insc").style.display = 'none';
        }
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
