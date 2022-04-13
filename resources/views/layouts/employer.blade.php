<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('employer/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('employer/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('employer/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('employer/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />


</head>

<body>

    @yield('content')
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('employer/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('/employer/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('employer/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('employer/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('employer/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('employer/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('employer/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('employer/js/main.js') }}"></script>
    @if (Session::has('delete'))
        <script>
            $(document).ready(function() {
                toastr.options.progressBar = true;
                toastr.success('Record Delete Successfully');
            });
        </script>
    @elseif(Session::has('create'))
        <script>
            $(document).ready(function() {
                toastr.options.progressBar = true;
                toastr.success('Record Created Successfully.');
            });
        </script>
    @elseif (Session::has('update'))
        <script>
            $(document).ready(function() {
                toastr.options.progressBar = true;
                toastr.success('Record Updated Successfully.');
            });
        </script>
    @elseif (Session::has('password'))
        <script>
            $(document).ready(function() {
                toastr.options.progressBar = true;
                toastr.success('Password Changed Successfully.');
            });
        </script>
    @elseif (Session::has('image'))
        <script>
            $(document).ready(function() {
                toastr.options.progressBar = true;
                toastr.success('Image Uploaded Successfully.');
            });
        </script>
    @endif
    @yield('scripts')
</body>

</html>
