<?php
$general_setting = DB::table('general_settings')->select('*')->first();
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>{{ $general_setting->sitename }}</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('adminLte/uploads/logo/') }}/{{ $general_setting->favicon }}"
        type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('user\assets\bower_components\bootstrap\css\bootstrap.min.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user\assets\icon\feather\css\feather.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user\assets\css\style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user\assets\css\jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user\assets\css\fxintense.css') }}">

    @stack('style-lib')
    @stack('style')
</head>

<body>




    @yield('content')
    @stack('renderModal')

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('user\assets\bower_components\jquery\js\jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user\assets\bower_components\jquery-ui\js\jquery-ui.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('user\assets\bower_components\popper.js\js\popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user\assets\bower_components\bootstrap\js\bootstrap.min.js') }}">
    </script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript"
        src="{{ asset('user\assets\bower_components\jquery-slimscroll\js\jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('user\assets\bower_components\modernizr\js\modernizr.js') }}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset('user\assets\bower_components\chart.js\js\Chart.js') }}"></script>
    <!-- amchart js -->
    <script src="{{ asset('user\assets\pages\widget\amchart\amcharts.js') }}"></script>
    <script src="{{ asset('user\assets\pages\widget\amchart\serial.js') }}"></script>
    <script src="{{ asset('user\assets\pages\widget\amchart\light.js') }}"></script>
    <script src="{{ asset('user\assets\js\jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user\assets\js\SmoothScroll.js') }}"></script>
    <script src="{{ asset('user\assets\js\pcoded.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('user\assets\js\vartical-layout.min.js') }}"></script>
    <script type="text/javascript" src=".{{ asset('user\assets\pages\dashboard\custom-dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user\assets\js\script.min.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    @include('user.dashboard.notify')
    @stack('script-lib')
    @stack('script')

</body>

</html>
