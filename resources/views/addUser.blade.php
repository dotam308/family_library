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
                <li><a href="index-2.html">Home</a></li>
                <li>Users</li>
            </ul>
        </div>
    </div>
</section>
@endsection
@section('content')
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="booksmedia-detail-main">
                <div class="container">
                    <br>
                    <h3>ADD ACCOUNT</h3>
                    <br>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-hover">
                            <tr>
                                <th>Username</th>
                                <td><input type="text" name="username" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><input type="text" name="email" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><input type="password" name="password" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td><select name="role" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                </td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection