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
            <div class="books-full-width">
                <div class="container">
                    <!-- Start: Search Section -->
                    <!-- End: Search Section -->
                    <a type="button" class="btn btn-primary" href="{{route('createuser')}}">ADD ACCOUNT</a>
                    <div class="booksmedia-fullwidth">
                        <ul>
                            @forelse ($users as $user)
                                @if(session('username')!=$user->username)
                                    <?php $id=$user->id;?>
                                        <li>
                                            <a href="{{route('edituser',compact('id'))}}" title="Edit"><i class="fa fa-edit"></i></a></i>
                                            <a href="{{route('deleteuser',compact('id'))}}" title="Delete"><i class="fa fa-trash"></i></a></i>
                                            <div class="book-list-icon blue-icon"></div>
                                            <figure>
                                                <figcaption>
                                                    <header>
                                                        <p><strong>Username </strong> {{$user->username}}</p>
                                                        <p><strong>Email: </strong> {{$user->email}}</p>
                                                        <p><strong>Role: </strong>{{$user->role}}</p>
                                                    </header>
                                                </figcaption>
                                            </figure>
                                        </li>
                                    @endif
                                @empty
                            <div>No users</div>
                            @endforelse
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
                <!-- Start: Staff Picks -->
                <section class="team staff-picks">
                    <div class="container">
                        <div class="center-content">
                            <h2 class="section-title">Staff Picks</h2>
                            <span class="underline center"></span>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="team-list">
                            <div class="team-member">
                                <figure>
                                    <img src="/assets/images/books-media/staff-pick/staff-picks-01.jpg"
                                        alt="Staff Pick" />
                                </figure>
                                <div class="content-block">
                                    <div class="member-info">
                                        <div class="member-thumb">
                                            <img src="/assets/images/books-media/staff-pick/gail.jpg" alt="Katherine">
                                        </div>
                                        <div class="member-content">
                                            <span class="designation">Downtown & Business</span>
                                            <h4>The Collector</h4>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-skype"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p>The point of using Lorem Ipsum is that it has a more-or-less normal
                                            distribution of letters, as opposed to using 'Content here...</p>
                                        <a class="btn btn-primary" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-member">
                                <figure>
                                    <img src="/assets/images/books-media/staff-pick/staff-picks-02.jpg"
                                        alt="Staff Pick" />
                                </figure>
                                <div class="content-block">
                                    <div class="member-info">
                                        <div class="member-thumb">
                                            <img src="/assets/images/books-media/staff-pick/katherine.jpg"
                                                alt="Katherine">
                                        </div>
                                        <div class="member-content">
                                            <span class="designation">Katherine, West End</span>
                                            <h4>Mongolia</h4>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-skype"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p>The point of using Lorem Ipsum is that it has a more-or-less normal
                                            distribution of letters, as opposed to using 'Content here...</p>
                                        <a class="btn btn-primary" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-member">
                                <figure>
                                    <img src="/assets/images/books-media/staff-pick/staff-picks-03.jpg"
                                        alt="Staff Pick" />
                                </figure>
                                <div class="content-block">
                                    <div class="member-info">
                                        <div class="member-thumb">
                                            <img src="/assets/images/books-media/staff-pick/chris.jpg" alt="Katherine">
                                        </div>
                                        <div class="member-content">
                                            <span class="designation">Chris, East Liberty</span>
                                            <h4>The Revolution</h4>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-skype"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p>The point of using Lorem Ipsum is that it has a more-or-less normal
                                            distribution of letters, as opposed to using 'Content here...</p>
                                        <a class="btn btn-primary" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End: Staff Picks -->
            </div>
        </main>
    </div>
</div>
@endsection
