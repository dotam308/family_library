@extends('mainLayout')
@section('bannerContainer')
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>Users Listing</h2>
            <span class="underline center"></span>
            <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="{{route('index')}}">Home</a></li>
                <li>Users</li>
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
                            <form action="{{route('usersearch')}}" method="get">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Search by Keyword" id="keywords"
                                            name="keywords" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="catalog" id="catalog" class="form-control">
                                            <option>Search the Catalog</option>
                                            <option>Catalog 01</option>
                                            <option>Catalog 02</option>
                                            <option>Catalog 03</option>
                                            <option>Catalog 04</option>
                                            <option>Catalog 05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select name="category" id="category" class="form-control">
                                            <option>All Categories</option>
                                            <option>Category 01</option>
                                            <option>Category 02</option>
                                            <option>Category 03</option>
                                            <option>Category 04</option>
                                            <option>Category 05</option>
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
                    <!-- End: Search Section -->
                    <div class="users-list-view">

                        <h3>Danh sách user</h3>

                        <div class="row">
                            <div class="col text-right">
                                <a type="button" class="btn btn-primary" href="{{route('createuser')}}">ADD ACCOUNT</a>
                            </div>
                        </div>
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
                                        <th>No.</th>
                                        <th>ID</th>
                                        <th>Username
                                            <input type="hidden" name="base-url" id="base-url" value="{{url('/')}}">
                                            <a href="{{route('users', compact('usern','desc'))}}" id = "usern_desc"><i
                                                    class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route('users', compact('usern','insc'))}}" id = "usern_insc"><i
                                                    class="fas fa-angle-double-up"></i></a></th>
                                        <th>Role
                                            <a href="{{route('users', compact('rol','desc'))}}" id = "rol_desc"><i
                                                    class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route('users', compact('rol','insc'))}}" id = "rol_insc"><i
                                                    class="fas fa-angle-double-up"></i></a></th>
                                        <th>E-mail
                                            <a href="{{route('users', compact('mail','desc'))}}" id = "mail_desc"><i
                                                    class="fas fa-angle-double-down"></i></a>
                                            <a href="{{route('users', compact('mail','insc'))}}" id = "mail_insc"><i
                                                    class="fas fa-angle-double-up"></i></a></th>
                                        <th>Action</th>
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
                                @endphp
                                @foreach($users as $user)
                                <?php $order++;?>
                                        <tr>
                                            <td>{{abs($order)}}</td>
                                            <td>{{$user->id}}</td>
                                                @if(session('username')==$user->username)
                                                    <td>{{$user->username}} (Your Account)</td>
                                                @else
                                                    <td>{{$user->username}}</td>
                                                @endif
                                            <td>{{$user->role}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <?php $id=$user->id;?>
                                                <a href="{{route('edituser', compact('id'))}}">
                                                    <i class="fa fa-pencil" aria-hidden="true" style="color:blue"></i>
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
                            <div>No users registered</div>
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
        $url = window.location.href;
        $a=document.getElementById("base-url").value;
        if ($url ===  $a + "/users?usern=r&desc=r") {
            document.getElementById("usern_desc").style.display = 'none';
        } 
        if ($url === $a + "/users?usern=r&insc=r") {
            document.getElementById("usern_insc").style.display = 'none';
        }
        if ($url === $a +"/users?rol=r&desc=r") {
            document.getElementById("rol_desc").style.display = 'none';
        } 
        if ($url === $a +"/users?rol=r&insc=r") {
            document.getElementById("rol_insc").style.display = 'none';
        }
        if ($url === $a +"/users?mail=r&desc=r") {
            document.getElementById("mail_desc").style.display = 'none';
        } 
        if ($url === $a +"/users?mail=r&insc=r") {
            document.getElementById("mail_insc").style.display = 'none';
        } 
       $('a[id=deleteButton]').click(function(){
           var id = $(this).attr('rel');
           var deleteFunction = $(this).attr('rel1');
           swal({
            title: "Are you sure?",
            text: "You will not be able to recover this account!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
            },
            function(){
                swal("Deleted!", "The account has been deleted.", "success");
                window.location.href = "/deleteUser/"+ deleteFunction + "/" + id;
            });
        })
    })
</script>
@endsection
