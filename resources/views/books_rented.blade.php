@extends('mainLayout')

@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Sách mượn</h2>
            <span class="underline center"></span>
            <p class="lead">Sách là bạn.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Quản lý</a></li>
                <li>Sách mượn</li>
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
                    <section class="search-filters">
                        <div class="filter-box">
                            <h3>Bạn cần tìm gì?</h3>
                            <form action="{{route('bookBorrowSearch')}}" method="get">
                                <div class="col-md-4 col-sm-6" style="width:615px">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Từ khoá" id="keywords"
                                            name="keywords" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="catalog" id="catalog" class="form-control">
                                            <option value="" disabled selected hidden>Tìm kiếm theo</option>
                                            <option value="name">Tiêu đề</option>
                                            <option value="username">Tên đăng nhập</option>
                                            <option value="borrowDate">Ngày mượn</option>
                                            <option value="returnDate">Ngày hẹn trả</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" type="submit" value="Tìm kiếm">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="clear"></div>
                    </section>
                    <!-- End: Search Section -->
                    <div class="users-list-view">
                        <h3>Sách mượn</h3>

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
                                            <th>Tên sách
                                                <input type="hidden" name="base-url" id="base-url" value="{{url('/')}}">
                                                <a href="{{route('books_rented', compact('bookname', 'desc', 'page'))}}" id = "bookname_desc"><i
                                                        class="fas fa-angle-double-down <?php if(isset($_GET['bookname']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                                <a href="{{route('books_rented', compact('bookname', 'insc', 'page'))}}" id = "bookname_insc"><i
                                                        class="fas fa-angle-double-up <?php if(isset($_GET['bookname']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                            <th>Người mượn
                                                <a href="{{route('books_rented', compact('borrower', 'desc', 'page'))}}" id = "borrower_desc"><i
                                                        class="fas fa-angle-double-down <?php if(isset($_GET['borrower']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                                <a href="{{route('books_rented', compact('borrower', 'insc', 'page'))}}" id = "borrower_insc"><i
                                                        class="fas fa-angle-double-up <?php if(isset($_GET['borrower']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                            </th>
                                            <th>Ngày mượn
                                                <a href="{{route('books_rented', compact('brdate', 'desc'))}}" id = "brdate_desc"><i
                                                        class="fas fa-angle-double-down"></i></a>
                                                <a href="{{route('books_rented', compact('brdate', 'insc'))}}" id = "brdate_insc"><i
                                                        class="fas fa-angle-double-up"></i></a>

                                            </th>
                                            <th>Ngày dự định trả
                                                <a href="{{route('books_rented', compact('redate', 'desc', 'page'))}}" id = "redate_desc"><i
                                                        class="fas fa-angle-double-down <?php if(isset($_GET['redate']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                                <a href="{{route('books_rented', compact('redate', 'insc', 'page'))}}" id = "redate_insc"><i
                                                        class="fas fa-angle-double-up <?php if(isset($_GET['redate']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                            </th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
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
                                            $o = 0;
                                        @endphp
                                        @forelse ($borrow as $b)
                                        <?php
                                        $id = $b->id;
                                        $o++;
                                        $i++;
                                        ?>
                                        <tr>
                                            <td>{{abs($o + ($c-1)*10)}}</td>
                                            <td>{{$b->name}}</td>
                                            <td>{{$b->username}}</td>
                                            <td>{{$b->borrowDate }}</td>
                                            <td>{{$b->returnDate }}</td>
                                            @if($b->returned == 'waiting')
                                            <td>Đang chờ xử lý</td>
                                            @elseif($b->returned == 'borrowing')
                                                <td>Đang mượn</td>
                                            @else
                                                <td>Đã trả</td>
                                            @endif

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
                            <div>Không có ai đang mượn sách!</div>
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
            title: "Bạn có chắc?",
            text: "Bạn sẽ không thể khôi phục dữ liệu sau khi xóa!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Có, hãy xóa nó!",
            closeOnConfirm: false
            },
            function(){
                window.location.href = "/delete_rented/" + id;
            swal("Xóa thành công!", "Đơn hàng đã được xóa.", "success");
            });
        })
    })
</script>

@endsection