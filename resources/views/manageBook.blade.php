@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Sách</h2>
            <span class="underline center"></span>
            {{-- <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p> --}}
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="#">Quản lý</a></li>
                <li>Sách</li>
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
                    <section class="search-filters">
                        <div class="filter-box"><br/>
                        <form action="{{route('bookSearch')}}" method="get">
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
                                        <option value="ddcCode">DDC</option>
                                        <option value="name">Tiêu đề</option>
                                        <option value="author">Tác giả</option>
                                        <option value="publisher">Nhà xuất bản</option>
                                        <option value="translator">Người dịch</option>
                                        <option value="country">Quốc gia</option>
                                        <option value="genre">Thể loại</option>
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
                    <form>
                        <h3>Danh sách</h3>
                        <div class="row">
                            <div class="col text-right">
                                <a type="button" class="btn btn-primary" href="{{ route('addBook') }}">Thêm sách</a>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <?php
                                $dc = "r";$bn = "r";$au = "r";$ge = "r";$pub = "r";$trans = "r";$coun = "r";$qua = "r";
                                $pri = "r";$insc = "r";$desc = "r";$page="r";
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                }
                                ?>

                                <tr>
                                    <th>STT</th>
                                    <th>
                                        
                                       <div class="row"> Mã DDC</tr>
                                        <input type="hidden" name="base-url" id="base-url" value="{{url('/')}}">
                                        <tr class="row">
                                            <a href="{{route('manageBooks', compact('dc','desc'))}}" id="dc_desc"><i class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route('manageBooks', compact('dc','insc'))}}" id="dc_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                        </tr>
                                    <th><tr>Tiêu đề</tr>
                                    <tr><a href="{{route('manageBooks', compact('bn','desc'))}}" id="bn_desc"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('bn','insc'))}}" id="bn_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    </tr>
                                        <th>Tác giả
                                    <a href="{{route('manageBooks', compact('au','desc'))}}" id="au_desc"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('au','insc'))}}" id="au_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Thể loại
                                    <a href="{{route('manageBooks', compact('ge','desc'))}}" id="ge_desc"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('ge','insc'))}}" id="ge_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Nhà xuất bản
                                    <a href="{{route('manageBooks', compact('pub','desc'))}}" id="pub_desc"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('pub','insc'))}}" id="pub_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Người dịch
                                    <a href="{{route('manageBooks', compact('trans','desc'))}}" id="trans_desc"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('trans','insc'))}}" id="trans_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Quốc gia
                                    <a href="{{route('manageBooks', compact('coun','desc'))}}" id="coun_desc"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('manageBooks', compact('coun','insc'))}}" id="coun_insc"><i class="fas fa-angle-double-up"></i></a></th>
                                    <th>Ảnh</th>
                                    <th>Thao tác</th>

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
                                        @endphp
                                    <tr>
                                        <input type="hidden" class="deleteIdButton" value="{{ $book->id }}"/>
                                        <td>{{ abs($i) }}</td>
                                        <td>{{ $book->ddcCode }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->genre }}</td>
                                        <td>{{ $book->publisher }}</td>
                                        <td>{{ $book->translator }}</td>
                                        <td>{{ $book->country }}</td>
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
       $('a[id=deleteButton]').click(function() {
           var id = $(this).attr('rel');
           var deleteFunction = $(this).attr('rel1');
           swal({
            title: "Bạn có chắc?",
            text: "Bạn sẽ không thể phục hồi dữ liệu sách!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Có, xóa nó!",
            closeOnConfirm: false
            },
            function(){
                swal("Đã xóa!", "Sách đã được xóa.", "success");
                window.location.href = "/deleteBook/"+ deleteFunction + "/" + id;
            });
        })
    })
</script>

@endsection