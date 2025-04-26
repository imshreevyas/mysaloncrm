<!doctype html>
<html lang="en">

<head>
@include('includes.head')
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('includes.header')
        

        <!-- ========== Left Sidebar Start ========== -->
        @include('includes.admin-sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="main-content">
            @yield('content')
        </div>

        <!-- end main content-->

        @include('includes.footer')

    </div>
    <!-- END layout-wrapper -->

    @include('includes.right-sidebar')


    @include('includes.footer-links')

</body>

</html>