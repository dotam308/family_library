@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Người dùng</h2>
            <span class="underline center"></span>
            <p class="lead">Bảo mật thông tin người dùng.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="{{route('index')}}">Quản lý</a></li>
                <li>Người dùng</li>
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
                            <form action="{{route('userSearch')}}" method="get">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Từ khoá" id="keywords"
                                            name="keywords" type="text" style="width:895px">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6" style="left:555px">
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

                        <h3>Danh sách người dùng</h3>
                        {{--<div class="row">
                            <div class="col text-right">
                                <a type="button" class="btn btn-primary" href="{{route('createUser')}}">Thêm tài khoản</a>
                            </div>
                        </div>--}}
                        <ul>
                            <?php
                            $usern = "r";
                            $rol = "r";
                            $mail = "r";
                            $insc = "r";
                            $desc = "r"; 
                            ?>
                            @if(count($users)>0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên đăng nhập
                                            <input type="hidden" name="base-url" id="base-url" value="{{url('/')}}">
                                            <a class="col text-left" 
                                                href="{{route('users', compact('usern','desc'))}}" class="<?php if(isset($_GET['usern']) && isset($_GET['desc'])) echo "isDisabled"?>" id = "usern_desc">
                                                <i class="fas fa-angle-double-down <?php if(isset($_GET['usern']) && isset($_GET['desc'])) echo "activeDir";?>"></i>
                                            </a>
                                            <a class="col text-right" href="{{route('users', compact('usern','insc'))}}" id = "usern_insc"><i
                                                    class="fas fa-angle-double-up <?php if(isset($_GET['usern']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>

                                        <th>Vai trò
                                            <a href="{{route('users', compact('rol','desc'))}}" id = "rol_desc"><i
                                                    class="fas fa-angle-double-down <?php if(isset($_GET['rol']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route('users', compact('rol','insc'))}}" id = "rol_insc"><i
                                                    class="fas fa-angle-double-up <?php if(isset($_GET['rol']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>
                                        <th>E-mail
                                            <a href="{{route('users', compact('mail','desc'))}}" id = "mail_desc"><i
                                                    class="fas fa-angle-double-down <?php if(isset($_GET['mail']) && isset($_GET['desc'])) echo "activeDir";?>"></i></a>
                                            <a href="{{route('users', compact('mail','insc'))}}" id = "mail_insc"><i
                                                    class="fas fa-angle-double-up <?php if(isset($_GET['mail']) && isset($_GET['insc'])) echo "activeDir";?>"></i></a></th>

                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                @php
                                    $c = $users->currentPage();
                                    if (isset($_GET['desc'])) {
                                        $order = -($users->total()+1);
                                        $order += 10*($c-1);
                                    } else {
                                        $order = 10*($c-1);
                                    }
                                    $i=0;
                                @endphp
                                @foreach($users as $user)
                                <?php $order++;$i++;?>
                                        <tr>
                                            <td>{{abs($i+($c-1)*10)}}</td>
                                            {{-- <td>{{$user->id}}</td> --}}
                                            @if(session('username')==$user->username)
                                                <td>{{$user->username}} (Your Account)</td>
                                            @else
                                                <td>{{$user->username}}</td>
                                            @endif
                                            <td>{{$user->role}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <?php $id=$user->id;?>
                                                <a href="{{route('editUser', compact('id'))}}">
                                                    <i class="fa fa-pen" aria-hidden="true" style="color:blue"></i>
                                                </a>
                                                <a rel="{{$id}}" rel1="user" href="javascript:" id="deleteButton" class="deleteButton">
                                                    <i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                                </a>
                                            </td>
                                        </tr>
                                @endforeach
                            </table>
                            @else
                            <br>
                            <div>Không có người dùng nào!</div>
                            @endif
                        </ul>
                    </div>
                    <!--navigation-->
                    @include('includes.navigation', ['data'=>$users])
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
       $('a[id=deleteButton]').click(function(){
           var id = $(this).attr('rel');
           var deleteFunction = $(this).attr('rel1');
           swal({
            title: "Bạn chắc chứ?",
            text: "Bạn sẽ không thể khôi phục tài khoản này!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Đồng ý xoá",
            closeOnConfirm: false
            },
            function(){
                swal("Deleted!", "Đã xoá thành công.", "success");
                window.location.href = "/delete_user/"+ deleteFunction + "/" + id;
            });
        })
    })
</script>
@endsection
