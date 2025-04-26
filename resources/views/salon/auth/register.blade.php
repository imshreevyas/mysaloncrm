<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>{{ isset($setting) && $setting->page_title ? $setting->page_title : 'Salon Registration | Admin Panel' }}</title>
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
        <!-- twitter-bootstrap-wizard css -->
        <link rel="stylesheet" href="{{ asset('admin/assets/libs/twitter-bootstrap-wizard/prettify.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/toastr/build/toastr.min.css') }}">
        <style>
        .error-input { border: 1px solid red !important; }
        .shake {
            animation: shake 0.5s;
            animation-iteration-count: 1;
        }

        @keyframes shake {
            0% { transform: translate(1px, 1px) rotate(0deg); }
            10% { transform: translate(-1px, -2px) rotate(-1deg); }
            20% { transform: translate(-3px, 0px) rotate(1deg); }
            30% { transform: translate(3px, 2px) rotate(0deg); }
            40% { transform: translate(1px, -1px) rotate(1deg); }
            50% { transform: translate(-1px, 2px) rotate(-1deg); }
            60% { transform: translate(-3px, 1px) rotate(0deg); }
            70% { transform: translate(3px, 1px) rotate(-1deg); }
            80% { transform: translate(-1px, -1px) rotate(1deg); }
            90% { transform: translate(1px, 2px) rotate(0deg); }
            100% { transform: translate(1px, -2px) rotate(-1deg); }
        }
        </style>
    </head>

    <body class="auth-body-bg">
        <div class="p-2 home-btn position-absolute d-sm-block" style="right:0;z-index:1">
            <a href="{{ route('home') }}"><i class="mdi mdi-close h3 text-grey"></i></a>
        </div>
        <div>

        <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <div class="authentication-bg position-relative">
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div>
                                            <div class="text-center">
                                                <div>
                                                    <a href="index.html" class="authentication-logo"><img src="{{ asset('admin/assets/images/logo-dark.png') }}" height="20" alt="logo"></a>
                                                </div>
    
                                                <h4 class="font-size-18 mt-4">Register Now!</h4>
                                                <p class="text-muted">Get your free {{ env('APP_NAME') }} account now.</p>
                                            </div>
                                            @include('display_errors')
                                            <div class="p-2 mt-">
                                                <form id="register-form" action="{{ route('salon.submit_register') }}" method="POST">
                                                    @csrf                                                
                                                    <div class="auth-form-group-custom mb-4">
                                                        <i class="mdi mdi-account auti-custom-input-icon"></i>
                                                        <label for="useremail">Business Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="salon_name" name="salon_name" placeholder="Enter Business Name">
                                                    </div>

                                                    <div class="auth-form-group-custom mb-4">
                                                        <i class="mdi mdi-account auti-custom-input-icon"></i>
                                                        <label for="useremail">Your Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="owner_name" name="owner_name" placeholder="Enter Your FullName">
                                                    </div>
                                                
                                                    <div class="auth-form-group-custom mb-4">
                                                        <i class="mdi mdi-phone auti-custom-input-icon"></i>
                                                        <label for="username">Mobile<span class="text-danger">*</span></label>
                                                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile Number">
                                                    </div>

                                                    <div class="auth-form-group-custom mb-4">
                                                        <i class="mdi mdi-email auti-custom-input-icon"></i>
                                                        <label for="username">Email<span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                                                    </div>
                                                
                                                    <div class="auth-form-group-custom mb-4">
                                                        <i class="ri-eye-close-fill auti-custom-input-icon" onclick="showpassword(this)"></i>
                                                        <label for="userpassword">Password<span class="text-danger">*</span></label>
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                                    </div>
                                                
                                                    <div class="text-center">
                                                        <button class="btn btn-primary w-xl waves-effect waves-light" type="submit">Continue <i class="mdi mdi-arrow-right"></i></button>
                                                        <a href="{{ route('salon.auth.google.redirect') }}" class="btn btn-outline-dark w-xs waves-effect waves-light" type="submit"><svg style="width:20px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="LgbsSe-Bz112c"><g><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path><path fill="none" d="M0 0h48v48H0z"></path></g></svg></a>
                                                    </div>
                                                
                                                    <div class="mt-4 text-center">
                                                        <span style="font-size:16px">Already have an account ? <a href="{{ route('salon.login') }}" class="fw-medium text-primary"> Login</a> </span>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <p class="mb-0">By registering you agree to the {{ env('APP_NAME') }} <a href="#" class="text-primary">Terms of Use</a></p>
                                                        <p>© <script>document.write(new Date().getFullYear())</script> {{ env('APP_NAME') }}. Crafted with <i class="mdi mdi-heart text-danger"></i> by blueleaf.com</p>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
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
        <!-- twitter-bootstrap-wizard js -->
        <script src="{{ asset('admin/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

        <script src="{{ asset('admin/assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

        <!-- form wizard init -->
        <script src="{{ asset('admin/assets/js/pages/form-wizard.init.js') }}"></script>
        <script src="{{ asset('admin/assets/js/common.js') }}"></script>

        <!-- toastr plugin -->
        <script src="{{ asset('admin/assets/libs/toastr/build/toastr.min.js') }}"></script>

        <!-- toastr init -->
        <script src="{{ asset('admin/assets/js/pages/toastr.init.js') }}"></script>

    </body>
</html>
