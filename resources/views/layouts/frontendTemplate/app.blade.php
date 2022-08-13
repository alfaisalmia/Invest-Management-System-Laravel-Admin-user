<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8" />
    <title>Fx intense</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="FxIntense" />
    <meta name="keywords" content="FxIntense" />
    <meta name="author" content="" />
    <meta name="MobileOptimized" content="320" />
    <!--Template style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/fonts.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/flaticon.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/font-awesome.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/nice-select.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/datatables.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/dropify.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/reset.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/responsive.css')}}" />
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
<script src='../../../google_analytics_auto.js'></script></head>

<body>
    <!-- preloader Start -->
    <!-- preloader Start -->
   <!--  <div id="preloader">
        <div id="status">
            <img src="images/loader.gif" id="preloader_image" alt="loader">
        </div>
    </div> -->
    <div class="cursor"></div>
    <!-- Top Scroll Start -->
    <a href="javascript:" id="return-to-top"> <i class="fas fa-angle-double-up"></i></a>
    <!-- Top Scroll End -->
    <!-- cp navi wrapper Start -->
    <nav class="cd-dropdown d-block d-sm-block d-md-block d-lg-none d-xl-none">
        <h2><a href="{{url('/')}}"> fxintense </a></h2>
        <a href="#0" class="cd-close">Close</a>
        <ul class="cd-dropdown-content">
            <li>
                <form class="cd-search">
                    <input type="search" placeholder="Search...">
                </form>
            </li>
             <li class="has-children">
                <a href="{{url('/')}}">Home</a>
               
            </li>
            <li><a href="{{url('/about')}}"> about us </a></li>
            <li><a href="{{url('/investment')}}"> Plan </a></li>
            <li><a href="{{url('/faq')}}"> FAQ </a></li>
           
            <li class="has-children">
                <a href="#">blog</a>
               
            </li>
            <li><a href="{{url('/contact')}}"> contact us </a></li>
            <li><a href="{{url('/login')}}"> login </a></li>
            <li><a href="{{url('/register')}}"> register </a></li>
        </ul>
        <!-- .cd-dropdown-content -->
    </nav>
    <?php
    use App\Models\GeneralSetting;
    $general = GeneralSetting::first();
    $image = $general->logo;
    $file = public_path('/adminLte/uploads/logo/' . $image);
    if (file_exists($file)) {
        $image = $general->logo;
    } else {
        $image = 'noimage.png';
    }
    ?>

    <div class="cp_navi_main_wrapper index2_header_wrapper float_left">
        <div class="container-fluid">
            <div class="cp_logo_wrapper">
                <a href="{{url('/')}}">
                    <img src="{{ asset('adminLte/uploads/logo/') }}/{{ $image }}" style="width: 200px; height:55px;" alt="logo">
                </a>
            </div>
            <!-- mobile menu area start -->
            <header class="mobail_menu d-block d-sm-block d-md-block d-lg-none d-xl-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cd-dropdown-wrapper">
                                <a class="house_toggle" href="#0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                                        <g>
                                            <g>
                                                <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#004165" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#004165" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <!-- .cd-dropdown -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- .cd-dropdown-wrapper -->
            </header>
            <div class="top_header_right_wrapper top_phonecalls">
                <p><i class="flaticon-phone-contact"></i> +92 304 871 2856</p>
                <div class="header_btn">
                    <ul>
                        <li>
                            <a href="{{url('/register')}}"> register </a> </li>
                        <li>
                            <a href="{{url('/login')}}"> login </a> </li>
                    </ul>

                </div>
            </div>

            <div class="cp_navigation_wrapper">
                <div class="mainmenu d-xl-block d-lg-block d-md-none d-sm-none d-none">
                    <ul class="main_nav_ul">
                       <li class="has-mega gc_main_navigation"><a href="{{url('/')}}" class="gc_main_navigation active_class">Home </a>
                            
                        </li>   
                        <li><a href="{{url('/about')}}" class="gc_main_navigation">about us</a></li>
                        <li><a href="{{url('/investment')}}" class="gc_main_navigation">investment plan</a></li>
                        <li class="has-mega gc_main_navigation"><a href="{{url('/faq')}}" class="gc_main_navigation">FAQ </a>
                        
                        </li>
                       
                        <li class="has-mega gc_main_navigation"><a href="#" class="gc_main_navigation">blog </a>
                          
                        </li>
                        <li><a href="{{url('/contact')}}" class="gc_main_navigation">contact us</a></li>
                    </ul>
                </div>
                <!-- mainmenu end -->
            </div>
        </div>
    </div>


    @yield('content')
<!-- footer section start-->
<div class="footer_main_wrapper float_left"  style="background-image: linear-gradient(to bottom, #23a9e1, #0090dc, #0076d4, #005ac6, #073bb3);">

<div class="container">

    <div class="row">

        <div class="col-lg-4 col-md-6 col-12 col-sm-12">
            <div class="wrapper_second_about">
                <div class="wrapper_first_image">
                    <a href="{{url('/')}}"><img src="{{ asset('frontend/assets/images/logo.png')}}" class="img-responsive" alt="logo" style="width: 205px; height:55px;"/></a>
                </div>
                <p>We are a full service Digital Marketing Agency all the foundational tool you need.</p>
                <div class="counter-section">
                    <div class="ft_about_icon float_left">
                        <i class="flaticon-user"></i>
                        <div class="ft_abt_text_wrapper">
                            <p class="timer"> 62236</p>
                            <h4>total member</h4>
                        </div>

                    </div>
                    <div class="ft_about_icon float_left">
                        <i class="flaticon-money-bag"></i>
                        <div class="ft_abt_text_wrapper">
                            <p class="timer">27236</p>
                            <h4>total deposited</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-3 col-12 col-sm-4">
            <div class="wrapper_second_useful">
                <h4>usefull links </h4>

                <ul>
                    <li><a href="{{url('/about')}}"><i class="fa fa-angle-right"></i>About us</a>
                    </li>

                    <li><a href="{{url('/contact')}}"><i class="fa fa-angle-right"></i>contact </a>
                    </li>
                    <li><a href="{{url('/investment')}}"><i class="fa fa-angle-right"></i>Investment Plan</a>
                    </li>
                    <li><a href="{{url('/faq')}}"><i class="fa fa-angle-right"></i>FAQ</a> </li>
                    <li><a href="{{url('/contact')}}"><i class="fa fa-angle-right"></i>Contact</a> </li>
                </ul>

            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-12 col-sm-4">
            <div class="wrapper_second_useful wrapper_second_links">

                <ul>
                    <li><a href="{{url('/')}}"><i class="fa fa-angle-right"></i>Home</a>
                    </li>
                    <li><a href="{{url('/register')}}"><i class="fa fa-angle-right"></i>Register</a>
                    </li>
                    <li><a href="{{url('/login')}}"><i class="fa fa-angle-right"></i>Login</a>
                    </li>
                    <li><a href="#"><i class="fa fa-angle-right"></i>Blog</a>
                    </li>
                    <li><a href="#"><i class="fa fa-angle-right"></i>career</a> </li>
                </ul>

            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 col-sm-12">
            <div class="wrapper_second_useful wrapper_second_useful_2">
                <h4>contact  us</h4>

                <ul>
                    <li>
                        <h1>+92 304 871 2856</h1></li>
                    <li><a href="mailto:info@fxintense.com"><i class="flaticon-mail"></i>info@fxintense.com</a>
                    </li>
                    <li><a href="#"><i class="flaticon-language"></i>www.fxintense.com</a>
                    </li>

                    <li><i class="flaticon-placeholder"></i>3rd Floor, NTC-HQs Building
Attaturk Avenue (East), Sector G-5/2
Islamabad
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="copyright_wrapper float_left">
                <div class="copyright">
                    <p>Copyright <i class="far fa-copyright"></i> 2022 <a href="{{url('/')}}"> Fxintense</a>. all right reserved.</p>
                </div>
                <div class="social_link_foter">

                    <ul>
                        <li><a href="www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="www.twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="www.linkedin.com"><i class="fab fa-linkedin-in"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- footer section end-->






    <!--custom js files-->
    <script src="{{ asset('frontend/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/modernizr.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.menu-aim.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugin.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/dropify.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/datatables.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.inview.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/calculator.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    <!-- custom js-->
</body>

</html>