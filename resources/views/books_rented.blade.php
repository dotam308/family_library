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
                                $insc = "i";
                                $page = "r";
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                }?>
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Book Name
                                                <input type="hidden" name="base-url" id="base-url" value="{{url('/')}}">
                                                <a href="{{route('books_rented', compact('bookname', 'desc', 'page'))}}" id = "bookname_desc"><i
                                                        class="fas fa-angle-double-down <?php if(isset($_GET['bookname']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                                <a href="{{route('books_rented', compact('bookname', 'insc', 'page'))}}" id = "bookname_insc"><i
                                                        class="fas fa-angle-double-up <?php if(isset($_GET['bookname']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                            <th>Borrower
                                                <a href="{{route('books_rented', compact('borrower', 'desc', 'page'))}}" id = "borrower_desc"><i
                                                        class="fas fa-angle-double-down <?php if(isset($_GET['borrower']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                                <a href="{{route('books_rented', compact('borrower', 'insc', 'page'))}}" id = "borrower_insc"><i
                                                        class="fas fa-angle-double-up <?php if(isset($_GET['borrower']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                            </th>
                                            <th>Quantity
                                                <a href="{{route('books_rented', compact('quantityx', 'desc', 'page'))}}" id = "quantityx_desc"><i
                                                        class="fas fa-angle-double-down <?php if(isset($_GET['quantityx']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                                <a href="{{route('books_rented', compact('quantityx', 'insc', 'page'))}}" id = "quantityx_insc"><i
                                                        class="fas fa-angle-double-up <?php if(isset($_GET['quantityx']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                            </th>
                                            <th>Borrow Date
                                                <a href="{{route('books_rented', compact('brdate', 'desc', 'page'))}}" id = "brdate_desc"><i
                                                        class="fas fa-angle-double-down <?php if(isset($_GET['brdate']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                                <a href="{{route('books_rented', compact('brdate', 'insc', 'page'))}}" id = "brdate_insc"><i
                                                        class="fas fa-angle-double-up <?php if(isset($_GET['brdate']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                            </th>
                                            <th>Return Date
                                                <a href="{{route('books_rented', compact('redate', 'desc', 'page'))}}" id = "redate_desc"><i
                                                        class="fas fa-angle-double-down <?php if(isset($_GET['redate']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                                <a href="{{route('books_rented', compact('redate', 'insc', 'page'))}}" id = "redate_insc"><i
                                                        class="fas fa-angle-double-up <?php if(isset($_GET['redate']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                            </th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $c = $borrow->currentPage();
                                            if (isset($_GET['desc'])) {
                                                $i = -($borrow->total()+1);
                                                $i += 10*($c-1);
                                            } else {
                                                $i = 10*($c-1);
                                            }
                                        @endphp
                                        @forelse ($borrow as $b)
                                        <?php
                                        $id = $b->id;
                                        
                                        $i++;
                                        ?>
                                        <tr>
                                            <td>{{abs($i)}}</td>
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
                    @include('includes.navigation', ['data'=>$borrow])
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