<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>{{ isset($setting) && $setting->page_title ? $setting->page_title : 'Login | Admin Panel' }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Blueleaf" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">
        <!-- Bootstrap Css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="home-btn d-none d-sm-block">
            <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="text-center">
                                                <div>
                                                    <a href="index.html" class="authentication-logo"><img src="{{ asset('admin/assets/images/logo-dark.png') }}" height="20" alt="logo"></a>
                                                </div>
    
                                                <h4 class="font-size-18 mt-4">Welcome !</h4>
                                                <p class="text-muted">Sign in to continue to your CRM.</p>
                                            </div>

                                            @include('display_errors')
                                            <div class="p-2 mt-5">
                                                <form class="" method="POST" action="{{ route('admin.adminLoginPost') }}">
                                                    @csrf
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username" class="fw-semibold">Username</label>
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                                    </div>
                            
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                        <label for="userpassword">Password</label>
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                                    </div>
                            
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customControlInline">
                                                        <label class="form-check-label" for="customControlInline">Remember me</label>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <a href="{{ route('admin.forgot-password') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p>© <script>document.write(new Date().getFullYear())</script> My Salon CRM. Crafted with <i class="mdi mdi-heart text-danger"></i> by blueleaf.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="authentication-bg">
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- JAVASCRIPT -->
        <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    </body>
</html>
