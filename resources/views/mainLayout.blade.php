<!DOCTYPE html>
<html lang="zxx">

<head>

    @include("includes.head")

    @yield('script')
</head>

<body>
    
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=157330463046823&autoLogAppEvents=1" nonce="Rb8VVvpU"></script>
    <!-- Start: Header Section -->
    @include('includes.header')
    <!-- End: Header Section -->

    <!-- Start: Page Banner -->
    {{-- except: index --}}
    @yield('bannerContainer')
    <!-- End: Page Banner -->

    <!-- content-->
    @yield('content')

    <!-- Start: Social Network -->
    @include("includes.socialNetwork")
    <!-- End: Social Network -->

    <!-- Start: Footer -->
    @include("includes.footer")
    <!-- End: Footer -->

    <!-- jQuery Latest Version 1.x -->
    @include("includes.jsLib")

    @include('sweetalert::alert')
    
</body>


</html>