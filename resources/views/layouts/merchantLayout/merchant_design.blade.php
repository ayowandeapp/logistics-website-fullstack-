<?php
/**
 * Created by PhpStorm.
 * User: softy
 * Date: 29/09/20
 * Time: 01:49
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@if(!empty($meta_title))  {{ $meta_title }} @else Online Logistics Merchant Site @endif</title>
    @if(!empty($meta_description))
     <meta name="description" content="{{ $meta_description  }}">
    @endif
    @if(!empty($meta_keywords))
     <meta name="keywords" content="{{ $meta_keywords  }}">
    @endif
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('images/backend_images/favicon.ico') }}">
    <link href="{{ asset('js/backend_js/plugins/alertify/css/alertify.css') }}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
        <link href="{{ asset('js/backend_js/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('js/backend_js/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('js/backend_js/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 

    <!-- jvectormap -->
    <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link href="assets/plugins/fullcalendar/vanillaCalendar.css" rel="stylesheet" type="text/css"  />

    <link href="assets/plugins/morris/morris.css" rel="stylesheet">

    <link href="{{ asset('css/backend_css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/backend_css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/backend_css/style.css') }}" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div id="wrapper">

<!-- ========== Left Sidebar Start ========== -->

@include('layouts/merchantLayout/merchant_sidebar')
<!-- Left Sidebar End -->

<!-- Start right Content here -->

<div class="content-page">
<!-- Start content -->
<div class="content">
@include('alertify::alertify')

<!-- Top Bar Start -->

@include('layouts/merchantLayout/merchant_header')

<!-- Top Bar End -->

<div class="page-content-wrapper ">

@yield('content')
    <!-- container -->

</div> <!-- Page content Wrapper -->

</div>

<!-- content -->
@include('layouts/merchantLayout/merchant_footer')
</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->
<!-- jQuery  -->
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
<script src="{{ asset('js/backend_js/popper.min.js') }}"></script>
<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/backend_js/modernizr.min.js') }}"></script>
<script src="{{ asset('js/backend_js/detect.js') }}"></script>
<script src="{{ asset('js/backend_js/fastclick.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('js/backend_js/waves.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.nicescroll.js') }}"></script> 
@yield('plugins')
@yield('pages')

<script src="{{ asset('js/backend_js/plugins/alertify/js/alertify.js') }}"></script>
@if(Session::has('success'))
<script type="text/javascript">
$(document).ready(function () {
            alertify.success("{{Session::get('success')}}");
        });
</script>
@endif
@if(Session::has('error'))
<script type="text/javascript">
$(document).ready(function () {
            alertify.error("{{Session::get('success')}}");
        });
</script>
@endif
<!-- App js -->
<script src="{{ asset('js/backend_js/app.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
                // Update the current year in copyright
                $('.current-year').text(new Date().getFullYear());                           
            });
</script>

</body>
</html>