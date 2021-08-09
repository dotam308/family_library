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
                        <div class="filter-box"><br />
                            <form action="{{route('bookManagementSearch')}}" method="get">
                                <div class="col-md-4 col-sm-6" style="width:615px">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Từ khoá" id="keywords" name="keywords"
                                            type="text">
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

                                <tr class="row">
                                    <th class="col-1">STT</th>
                                    <th class="col-1">DDC
                                        <a href="{{route('manageBooks', compact('dc','desc','page'))}}" id="dc_desc"><i
                                                class="fas fa-angle-double-down <?php if(isset($_GET['dc']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('dc','insc','page'))}}" id="dc_insc"><i
                                                class="fas fa-angle-double-up <?php if(isset($_GET['dc']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                    </th>

                                    <th class="col-1">Tiêu đề
                                        <a href="{{route('manageBooks', compact('bn','desc','page'))}}" id="bn_desc"><i
                                                class="fas fa-angle-double-down <?php if(isset($_GET['bn']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('bn','insc','page'))}}" id="bn_insc"><i
                                                class="fas fa-angle-double-up <?php if(isset($_GET['bn']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                    </th>

                                    <th class="col-2">Tác giả
                                        <a href="{{route('manageBooks', compact('au','desc','page'))}}" id="au_desc"><i
                                                class="fas fa-angle-double-down <?php if(isset($_GET['au']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('au','insc','page'))}}" id="au_insc"><i
                                                class="fas fa-angle-double-up <?php if(isset($_GET['au']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                    </th>
                                    <th class="col-2">Thể loại
                                        <a href="{{route('manageBooks', compact('ge','desc','page'))}}" id="ge_desc"><i
                                                class="fas fa-angle-double-down <?php if(isset($_GET['ge']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('ge','insc','page'))}}" id="ge_insc"><i
                                                class="fas fa-angle-double-up <?php if(isset($_GET['ge']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                    </th>
                                    <th class="col-2">Nhà xuất bản
                                        <a href="{{route('manageBooks', compact('pub','desc','page'))}}"
                                            id="pub_desc"><i
                                                class="fas fa-angle-double-down <?php if(isset($_GET['pub']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('pub','insc','page'))}}"
                                            id="pub_insc"><i
                                                class="fas fa-angle-double-up <?php if(isset($_GET['pub']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                    </th>
                                    <th class="col-2">Người dịch
                                        <a href="{{route('manageBooks', compact('trans','desc','page'))}}"
                                            id="trans_desc"><i
                                                class="fas fa-angle-double-down <?php if(isset($_GET['trans']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('trans','insc','page'))}}"
                                            id="trans_insc"><i
                                                class="fas fa-angle-double-up <?php if(isset($_GET['trans']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                    </th>
                                    <th class="col-2">Quốc gia
                                        <a href="{{route('manageBooks', compact('coun','desc','page'))}}"
                                            id="coun_desc"><i
                                                class="fas fa-angle-double-down <?php if(isset($_GET['coun']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('coun','insc','page'))}}"
                                            id="coun_insc"><i
                                                class="fas fa-angle-double-up <?php if(isset($_GET['coun']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                    </th>
                                    <th class="col-1">Ảnh</th>
                                    <th class="col-1">Thao tác</th>

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
                                $o = 0;
                                @endphp
                                @foreach ($books as $book)

                                @php
                                $i++;$o++;
                                @endphp
                                <tr class="row">
                                    <input type="hidden" class="deleteIdButton col-1" value="{{ $book->id }}" />
                                    <td class="col-1">{{ abs($o+($c-1)*10) }}</td>
                                    <td class="col-1">{{ $book->ddcCode }}</td>
                                    <td class="col-1">{{ $book->name }}</td>
                                    <td class="col-2">{{ $book->author }}</td>
                                    <td class="col-2">{{ $book->genre }}</td>
                                    <td class="col-2">{{ $book->publisher }}</td>
                                    <td class="col-2">{{ $book->translator }}</td>
                                    <td class="col-2">{{ $book->country }}</td>
                                    <td class="col-1">
                                        <img src="/storage/{{ $book->image }}" alt="image" class="small-img" />
                                    </td>
                                    <td class="col-1">
                                        <?php $id = $book->id; ?>
                                        <a href="{{ route('editBook', compact('id')) }}" id="editButton">
                                            <i class="fa fa-pen" aria-hidden="true" style="color: blue"></i>
                                        </a>
                                        <a rel="{{ $id }}" rel1="book" href="javascript:" id="deleteButton"
                                            class="deleteButton">
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js">
</script>
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