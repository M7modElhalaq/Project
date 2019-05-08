<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/vendor/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('minified/themes/default.min.css')}}" />

    <link href="{{asset('dashboard/vendor/css/toastr.css')}}" rel="stylesheet"/>

    <link href="{{asset('dashboard/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">

    <title>DailyShop Dashboard</title>
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    @include('dashboard.include.navbar')
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    @include('dashboard.include.sidebar')
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    @yield('wrapper')
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="{{asset('dashboard/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<!-- bootstap bundle js -->
<script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- slimscroll js -->
<script src="{{asset('dashboard/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
<!-- main js -->
<script src="{{asset('dashboard/libs/js/main-js.js')}}"></script>
<!-- chart chartist js -->
<script src="{{asset('dashboard/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
<!-- sparkline js -->
<script src="{{asset('dashboard/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
<!-- morris js -->
<script src="{{asset('dashboard/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/charts/morris-bundle/morris.js')}}"></script>
<!-- chart c3 js -->
<script src="{{asset('dashboard/vendor/charts/c3charts/c3.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/charts/c3charts/C3chartjs.js')}}"></script>
<script src="{{asset('dashboard/libs/js/dashboard-ecommerce.js')}}"></script>

<script src="{{asset('dashboard/vendor/js/toastr.min.js')}}"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}");
    @endif
</script>

<script src="{{asset('minified/sceditor.min.js')}}"></script>
<script src="{{asset('minified/formats/bbcode.js')}}"></script>
<script src="{{asset('minified/formats/xhtml.js')}}"></script>

<script>
    var textarea = document.getElementById('mytextarea');

    sceditor.create(textarea, {
        format: 'xhtml',
        style: 'minified/themes/content/default.min.css'
    });
</script>

</body>

</html>