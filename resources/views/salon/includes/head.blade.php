<meta charset="utf-8" />
<title>Boxed Layout | Nazox - Admin & Dashboard Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesdesign" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- jquery.vectormap css -->
<link href="{{ asset('admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

<!-- DataTables -->
<link href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />

<!-- Bootstrap Css -->
<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- Custom Css -->
<link href="{{ asset('admin/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

<!-- DataTables -->
<link href="{{ asset('admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('admin/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />

<script>
    APP_URL = `{{ env('APP_URL') }}`;
    SHOW_PASSWORD_POPUP = `{{ !empty($salon_details['password']) ? 'show' : 'hide' }}`;
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
