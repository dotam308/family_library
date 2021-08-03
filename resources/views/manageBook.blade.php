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
                    <section class="search-filters">
                        <div class="filter-box">
                            <h3>What are you looking for at the library?</h3>
                            <form action="{{route('bookManagementSearch')}}" method="get">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Search by Keyword" id="keywords"
                                            name="keywords" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="catalog" id="catalog" class="form-control">
                                            <option value="" disabled selected>Search the Catalog</option>
                                            <option value="ddcCode">DDC</option>
                                            <option value="name">Title</option>
                                            <option value="author">Author</option>
                                            <option value="publisher">Publisher</option>
                                            <option value="translator">Translator</option>
                                            <option value="country">Country</option>
                                            <option value="genre">Category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="copies" id="copies" class="form-control">
                                            <option value="" disabled selected>Copies</option>
                                            <option value="1"><50</option>
                                            <option value="2">50-100</option>
                                            <option value="3">100-150</option>
                                            <option value="4">≥150</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="price" id="price" class="form-control">
                                            <option value="" disabled selected>Price</option>
                                            <option value="1"><500</option>
                                            <option value="2">500-1000</option>
                                            <option value="3">1000-1500</option>
                                            <option value="4">≥1500</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" type="submit" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    <div class="clear"></div>
                    </section>
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
                                $pri = "r";$insc = "r";$desc = "r";$page="r";
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                }
                                ?>

                                <tr>
                                    <th>Số thứ tự/Order</th>
                                    <th>Mã DDC/DDC
                                        <input type="hidden" name="base-url" id="base-url" value="{{url('/')}}">
                                    <a href="{{route('manageBooks', compact('dc','desc','page'))}}" id="dc_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['dc']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('dc','insc','page'))}}" id="dc_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['dc']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Tên sách/Title
                                    <a href="{{route('manageBooks', compact('bn','desc','page'))}}" id="bn_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['bn']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('bn','insc','page'))}}" id="bn_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['bn']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Tác giả/Author
                                    <a href="{{route('manageBooks', compact('au','desc','page'))}}" id="au_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['au']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('au','insc','page'))}}" id="au_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['au']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Thể loại/Genre
                                    <a href="{{route('manageBooks', compact('ge','desc','page'))}}" id="ge_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['ge']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('ge','insc','page'))}}" id="ge_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['ge']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Nhà sản xuất/Publisher
                                    <a href="{{route('manageBooks', compact('pub','desc','page'))}}" id="pub_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['pub']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('pub','insc','page'))}}" id="pub_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['pub']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Người dịch/Translator
                                    <a href="{{route('manageBooks', compact('trans','desc','page'))}}" id="trans_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['trans']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('trans','insc','page'))}}" id="trans_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['trans']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Quốc gia/Country
                                    <a href="{{route('manageBooks', compact('coun','desc','page'))}}" id="coun_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['coun']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('coun','insc','page'))}}" id="coun_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['coun']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Số sách trong kho/Copies
                                    <a href="{{route('manageBooks', compact('qua','desc','page'))}}" id="qua_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['qua']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('qua','insc','page'))}}" id="qua_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['qua']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Giá/Price.
                                    <a href="{{route('manageBooks', compact('pri','desc','page'))}}" id="pri_desc"><i class="fas fa-angle-double-down <?php if(isset($_GET['pri']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                        <a href="{{route('manageBooks', compact('pri','insc','page'))}}" id="pri_insc"><i class="fas fa-angle-double-up <?php if(isset($_GET['pri']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                    <th>Ảnh/Image</th>
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