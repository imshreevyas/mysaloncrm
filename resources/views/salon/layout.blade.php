<!doctype html>
<html lang="en">

<head>
@include('salon.includes.head')
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('salon.includes.header')
        

        @include('salon.includes.salon-sidebar')
        <!-- Left Sidebar End -->

        <div class="main-content">
            @yield('content')
        </div>

        <!-- end main content-->

        @include('salon.includes.footer')

    </div>
    
    @include('salon.includes.right-sidebar')


    @include('salon.includes.footer-links')

    <!-- Updated Password Popup -->
    <div class="modal fade" id="update_password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form class="" action="{{ route('salon.update_password') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add New Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        @include('salon.auth.update-password')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-md waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-md waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Updated Password Popup -->

</body>

</html>