<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8" />
    <title>Sign In | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('salon/assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('salon/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('salon/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('salon/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('salon/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('salon/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />


</head>

<body>

    <div class="auth-page-wrapper">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-5 mb-2 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="{{ asset('salon/assets/images/logo-light.png') }}" alt="" height="20">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-2">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome!</h5>
                                </div>
                                <div class="p-2 mt-2">
                                    <form action="{{ route('salon.submit_register') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Business Name</label>
                                            <input type="text" class="form-control" id="salon_name" name="salon_name" placeholder="Enter Business Name">
                                        </div>

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Your Fullname</label>
                                            <input type="text" class="form-control" id="owner_name" name="owner_name" placeholder="Enter Your FullName">
                                        </div>

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number">
                                        </div>

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password" name="password">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Sign up</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title">Sign up with</h5>
                                            </div>
                                            <div>
                                                <a href="{{ route('salon.auth.google.redirect') }}" type="button" class="btn btn-outline-dark waves-effect waves-light">
                                                <svg style="height:24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 262">
                                                    <path fill="#4285F4" d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"></path>
                                                    <path fill="#34A853" d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"></path>
                                                    <path fill="#FBBC05" d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"></path>
                                                    <path fill="#EB4335" d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"></path>
                                                </svg>
                                                <span class="text-success" style="padding-left: 10px;">Login with Google</span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account ? <a href="{{ route('salon.login') }}" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> {{ env('APP_NAME') }}. Crafted with <i class="mdi mdi-heart text-danger"></i> by {{ env('PARENT_COMPANY') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('salon/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('salon/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('salon/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('salon/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('salon/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('salon/assets/libs/choices/choices.js') }}"></script>
    <script src="{{ asset('salon/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- particles js -->
    <script src="{{ asset('salon/assets/libs/particles.js/particles.js') }}"></script>
    <!-- particles app js -->
    <script src="{{ asset('salon/assets/js/pages/particles.app.js') }}"></script>
    <!-- password-addon init -->
    <script src="{{ asset('salon/assets/js/pages/password-addon.init.js') }}"></script>

    @include('display_errors')
</body>
</html>