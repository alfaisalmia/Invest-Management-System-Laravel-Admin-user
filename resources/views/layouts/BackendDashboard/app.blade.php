<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ($page_title ?? '') }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminLte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminLte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('adminLte/plugins/toastr/toastr.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    @stack('styles')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminLte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLte/plugins/bootstrap4-toggle/bootstrap4-toggle.min.css') }}">
<style>
    .content-header{
        padding: 5px 10px 0px 10px;
    }
    .marron{
        color:#d81b60;
    }
    .primary{
        color:#007bff;
    }
    .info{
        color:#17a2b8;
    }
    .success{
        color:#28a745;
    }
    .warning{
        color:#dc3545;
    }
    .black{
        color:#000000;
    }
    .gray-dark{
        color:#343a40;
    }
    .gray{
        color:#adb5bd;
    }
    .indigo{
        color:#6610f2;
    }
    .lightblue{
        color:#3c8dbc
    }
    .navy{
        color: #001f3f;
    }
    .purple{
        color:#605ca8;
    }
    .fuchsia{
        color:#f012be;
    }
    .pink{
        color: #e83e8c;
    }
    .orange{
        color: #ff851b;
    }
    .lime{
        color:#01ff70;
    }
    .teal{
        color:#39cccc;
    }
    .olive{
        color:#3d9970;
    }
    [class*="sidebar-dark-"] {
  background-color: #000 !important;
}
.content-wrapper > .content {
  padding: 15px .5rem;
    padding-top: 15px;
    padding-right: 0.5rem;
    padding-bottom: 15px;
    padding-left: 0.5rem;
}
.box.box-primary {
  border-top-color: #0079a1 !important
  ;
}
</style>

</head>

<body class="hold-transition sidebar-mini" style="font-size: 15px">

    <div class="wrapper">

        @include('layouts.BackendDashboard.navbar')
        @include('layouts.BackendDashboard.sidebar')
        @yield('content')
        @include('layouts.BackendDashboard.footer')

        @stack('script')
        @include('admin.partials.notify')
      

</body>

</html>
