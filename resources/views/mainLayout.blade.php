<!DOCTYPE html>
<html lang="zxx">
<head>

   @include("includes.head")

</head>

<body>
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