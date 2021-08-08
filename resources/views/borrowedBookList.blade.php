@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>{{ empty($returned) ? 'Các sách đang mượn' : 'Các sách đã trả' }}</h2>
            <span class="underline center"></span>
            {{-- <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p> --}}
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="index-2.html">Cá nhân</a></li>
                <li>{{ empty($returned) ? 'Sách đang mượn' : 'Sách đã trả' }}</li>
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
                        {{-- <h3>{{ empty($returned) ? 'Borrowing' : 'Returned' }} books list</h3> --}}
                        <br>
                        <br>
                        @if (count($books) == 0)
                            <p>Không có sách</p>
                        @else
                        <?php
                        $dc = "r";$bn = "r";$au = "r";$ge = "r";$qua = "r";$page="r";
                                $bd = "r";$rd="r";$insc = "r";$desc = "r";$bra = "r";
                                if (isset($_GET['page'])) {
                                     $page = $_GET['page'];
                                 }
                        if (empty($returned)) {
                            $routeName = 'borrowedBooks';
                        } else {
                            $routeName = 'returnedBooks';
                        }
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                        <th>STT</th>
                                        <th>Mã DDC
                                            <input type="hidden" name="base-url" id="base-url" value="{{url('/')}}">
                                            <a href="{{route($routeName, compact('dc','desc', 'page'))}}" id="dc_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['dc']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('dc','insc', 'page'))}}" id="dc_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['dc']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a>
                                        </th>
                                        <th>Tiêu đề
                                        <a href="{{route($routeName, compact('bn','desc', 'page'))}}" id="bn_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['bn']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('bn','insc', 'page'))}}" id="bn_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['bn']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                        <th>Tác giả
                                        <a href="{{route($routeName, compact('au','desc','page'))}}" id="au_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['au']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('au','insc','page'))}}" id="au_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['au']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                        <th>Thể loại
                                        <a href="{{route($routeName, compact('ge','desc','page'))}}" id="ge_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['ge']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('ge','insc','page'))}}" id="ge_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['ge']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                        <th>Số lượng mượn
                                        <a href="{{route($routeName, compact('qua','desc','page'))}}" id="qua_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['qua']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('qua','insc','page'))}}" id="qua_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['qua']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                        <th>Ngày mượn
                                        <a href="{{route($routeName, compact('bd','desc','page'))}}" id="bd_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['bd']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('bd','insc','page'))}}" id="bd_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['bd']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                        <th>Ngày dự định trả
                                        <a href="{{route($routeName, compact('rd','desc','page'))}}" id="rd_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['rd']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('rd','insc','page'))}}" id="rd_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['rd']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                        <th>Trạng thái</th>
                                    @if (isset($returned))
                                        <th>Sách đã trả ngày
                                        <a href="{{route($routeName, compact('bra','desc','page'))}}" id="bra_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['bra']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route($routeName, compact('bra','insc','page'))}}" id="bra_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['bra']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    @endif
                                    <th>Ảnh</th>
                                    @if (!isset($returned))
                                        <th>Thao tác</th>
                                    @endif

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
                                        <td><a href="{{ route('book_detail_byId', compact('id')) }}">{{ $book->name }}</a></td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->genre }}</td>
                                        <td>{{ $book->quantity }}</td>
                                        <td>{{ $book->borrowDate }}</td>
                                        <td>{{ $book->returnDate }}</td>
                                        @if($book->returned == 'waiting')
                                            <td>Đợi lấy sách</td>
                                        @elseif($book->returned == 'borrowing')
                                            <td>Đang mượn</td>
                                        @else
                                            <td>Đã trả</td>
                                        @endif
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
                                            <button><a rel="{{ $id }}" href="javascript:" id="deleteButton" style="color: #fff;">Hủy mượn</a></button>
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
        
       $('a[id=deleteButton]').click(function() {
           var id = $(this).attr('rel');
           
           swal({
            title: "Bạn có chắc?",
            text: "Đơn hàng sẽ bị hủy",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Có!",
            closeOnConfirm: false
            },
            function(){
                window.location.href = "/cancelBorrow/" + id;
            swal("Đã hủy", "Đơn hàng đã được hủy thành công.", "success");
            });
        })
    })
</script>
@endsection
