<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
<?php
$general_setting = DB::table('general_settings')->select('*')->first();
?>
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a href="{{route('user.home')}}" style="font-size: 30px">
                <img src="{{ asset('adminLte/uploads/logo/') }}/{{ $general_setting->logo }}"
                    style="width: 178px; height:37px;" alt="logo">
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="feather icon-maximize full-screen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                  
                </li>

                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            {{-- <img src="..\files\assets\images\avatar-4.jpg" class="img-radius" alt="User-Profile-Image"> --}} <span>{{ Auth::user()->firstname }}
                                &nbsp;{{ Auth::user()->lastname }}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn"
                            data-dropdown-out="fadeOut">
                            <li>
                                <a href="{{ route('user.change-password') }}">Change Password</a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sidebar chat start -->

<!-- Sidebar inner chat end-->
