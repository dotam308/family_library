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
                    <!-- End: Search Section -->
                    <a type="button" class="btn btn-primary" href="{{route('createuser')}}">ADD ACCOUNT</a>
                    <div class="users-list-view">
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
                                        <th>Username
                                        <a href="{{route('users', compact('usern','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('users', compact('usern','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                        <th>Role
                                        <a href="{{route('users', compact('rol','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('users', compact('rol','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                        <th>E-mail
                                        <a href="{{route('users', compact('mail','desc'))}}"><i class="fas fa-angle-double-down"></i></a>
                                        <a href="{{route('users', compact('mail','insc'))}}"><i class="fas fa-angle-double-up"></i></a></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php $order=0;?>
                                @foreach($users as $user)
                                <?php $order++;?>
                                        <tr>
                                            <td>{{$order}}</td>
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
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <a rel="{{$id}}" rel1="user" href="javascript:" id="deleteButton" class="deleteButton">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                @endforeach
                            </table>
                            @else
                                </br><div>No users registered</div>
                            @endif
                        </ul>
                    </div>
                    <!--navigation-->
                    <nav class="navigation pagination text-center">
                        <h2 class="screen-reader-text">Posts navigation</h2>
                        <div class="nav-links">
                            <a class="prev page-numbers" href="#."><i class="fa fa-long-arrow-left"></i> Previous</a>
                            <a class="page-numbers" href="#.">1</a>
                            <span class="page-numbers current">2</span>
                            <a class="page-numbers" href="#.">3</a>
                            <a class="page-numbers" href="#.">4</a>
                            <a class="next page-numbers" href="#.">Next <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </nav>
                    <!--end navigation-->
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
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
                window.location.href = "/deleteuser/"+ deleteFunction + "/" + id;
            });
        })
    })
</script>
@endsection
