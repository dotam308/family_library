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
                        <h3>My favorite</h3>
                        <br>
                        <br>
                        @if (count($books) == 0)
                        <p>There is no data</p>
                        @else
                        <?php
                        $dc = "r";$bn = "r";$au = "r";$ge = "r";$qua = "r";
                                $bd = "r";$rd="r";$insc = "r";$desc = "r";$page="r";
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                }
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>DDC code
                                        <input type="hidden" name="base-url" id="base-url" value="{{url('/')}}">
                                        <a href="{{route('favoriteBooks', compact('dc','desc','page'))}}" id="dc_desc"><i
                                                class="fas fa-angle-double-down  <?php if(isset($_GET['dc']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('favoriteBooks', compact('dc','insc','page'))}}" id="dc_insc"><i
                                                class="fas fa-angle-double-up  <?php if(isset($_GET['dc']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                    </th>
                                    <th>Title
                                        <a href="{{route('favoriteBooks', compact('bn','desc','page'))}}" id="bn_desc"><i
                                                class="fas fa-angle-double-down <?php if(isset($_GET['bn']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('favoriteBooks', compact('bn','insc','page'))}}" id="bn_insc"><i
                                                class="fas fa-angle-double-up <?php if(isset($_GET['bn']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Author
                                        <a href="{{route('favoriteBooks', compact('au','desc','page'))}}" id="au_desc"><i
                                                class="fas fa-angle-double-down <?php if(isset($_GET['au']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('favoriteBooks', compact('au','insc','page'))}}" id="au_insc"><i
                                                class="fas fa-angle-double-up <?php if(isset($_GET['au']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Genre
                                        <a href="{{route('favoriteBooks', compact('ge','desc','page'))}}" id="ge_desc"><i
                                                class="fas fa-angle-double-down <?php if(isset($_GET['ge']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('favoriteBooks', compact('ge','insc','page'))}}" id="ge_insc"><i
                                                class="fas fa-angle-double-up <?php if(isset($_GET['ge']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                   <th>Image</th>
                                   <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $c = $books->currentPage();
                                    if (isset($_GET['desc'])) {
                                        $i = -($books->total()+1);
                                        $i += 10*($c-1);
                                    } else {
                                        $i = 10*($c-1);
                                    }
                                @endphp
                                @foreach ($books as $book)

                                @php
                                $i++;
                                $id = $book->id;
                                @endphp
                                <tr>
                                    <td>{{ abs($i) }}</td>
                                    <td>{{ $book->ddcCode }}</td>
                                    <td><a href="{{ route('book_detail_byId', compact('id')) }}">{{ $book->name }}</a>
                                    </td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->genre }}</td>

                                    <td>
                                        <img src="/storage/{{ $book->image }}" alt="image" />
                                    </td>

                                    <td>
                                        <a rel="{{ $id }}" rel1= "book" href="javascript:" id="deleteButton" class="deleteButton">
                                            <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                        </a>
                                    </td>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js">
</script>
<script>
    $(document).ready(function() {
        
       $('a[id=deleteButton]').click(function() {
           var id = $(this).attr('rel');
           
           swal({
            title: "Are you sure?",
            text: "This book will be canceled",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            closeOnConfirm: false
            },
            function(){
                window.location.href = "/deleteFavoriteBookList/" + id;
              swal("Deleted!", "Your book has been deleted.", "success");
            });
        })
    })
</script>

@endsection