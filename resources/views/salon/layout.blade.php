<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="dark" data-sidebar-size="sm-hover" data-sidebar="light" data-layout-width="fluid"
    data-sidebar-image="none" data-preloader="disable">

<head>
@include('salon.includes.head')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('salon.includes.header')
        

        @include('salon.includes.salon-sidebar')
        <!-- Left Sidebar End -->

        <div class="main-content">
            
            @yield('content')
        
            @include('salon.includes.footer')

            <!-- end main content-->
        </div>

    </div>
    
    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
    
    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvass"
            data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>


    @include('salon.includes.right-sidebar')


    @include('salon.includes.footer-links')
</body>

</html>