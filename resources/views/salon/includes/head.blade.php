<meta charset="utf-8" />
<title>Dashboard | Velzon - Admin & Dashboard Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('msg/main-favicon.ico') }}">

<!-- jsvectormap css -->
<link href="{{ asset('salon/assets/libs/jsvectormap/css/jsvectormap.min.html') }}" rel="stylesheet" type="text/css" />

<!--Swiper slider css-->
<link href="{{ asset('salon/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

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

<script>
    APP_URL = `{{ env('APP_URL') }}`;
    SHOW_PASSWORD_POPUP = `{{ empty($salon_details['password']) ? 'show' : 'hide' }}`;
</script>
<style>
    /* Default to extra-large for smaller screens (mobile-first) */
    .modal-dialog {
        max-width: 1140px; /* Equivalent to modal-xl */
        margin: var(--bs-modal-margin);
        
    }

    /* Medium screens and up (web) */
    @media (min-width: 768px) {
        .modal-dialog {
            max-width: 800px; /* Equivalent to modal-md */
            margin: 1.75rem auto; /* Adjust margin as needed */
        }
    }
</style>