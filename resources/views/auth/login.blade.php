@extends('layouts.frontendTemplate.app')

@section('content')
    <!-- inner header wrapper start -->
    <div class="page_title_section">

        <div class="page_header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-9 col-12 col-sm-8">

                        <h1>login</h1>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="#"> Home </a>&nbsp; / &nbsp; </li>
                                <li>login</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner header wrapper end -->
    <!-- login wrapper start -->
    <div class="login_wrapper fixed_portion float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login_top_box float_left">
                        <div class="login_banner_wrapper">
                            <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo"
                                style="width: 200px; height:55px;">
                            <div class="about_btn  facebook_wrap float_left">

                                <a href="#" class="about_btn login_btn float_left">login with facebook <i class="fab fa-facebook-f"></i></a>

                            </div>
                            <div class="about_btn google_wrap float_left">

                                <a href="#">login with pinterest <i class="fab fa-pinterest-p"></i></a>

                            </div>
                            <div class="jp_regis_center_tag_wrapper jb_register_red_or">
                                <h1>OR</h1>
                            </div>
                        </div>

                        
                        <form method="POST" action="{{ route('user.login') }}">
                            @csrf

                            <div class="login_form_wrapper">
                                <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">

                                    <h3> login to enter</h3>

                                </div>
                                <div class="form-group icon_form comments_form">

                                    <input type="text" class="form-control require @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email Address*" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group icon_form comments_form">

                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror require"
                                        placeholder="Password *" required autocomplete="current-password" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <table class="table-bordered table table-sm" style="100%">
                                    <tr>
                                        <td>Email</td>
                                        <td>Password</td>
                                
                                    </tr>
                                    <tr>
                                        <td>faisalmia@gmail.com</td>
                                        <td>123456789</td>
                                
                                    </tr>
                                </table>
                                <div class="login_remember_box">
                                    <label class="control control--checkbox">Remember me
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <span class="control__indicator"></span>
                                    </label>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link forget_password" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif

                                </div>
                                <div class="about_btn login_btn float_left">
                                    <button type="submit" class="about_btn login_btn float_left">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                                <div class="dont_have_account float_left">
                                    <p>Don’t have an acount ? <a href="{{ url('/register') }}">Sign up</a></p>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login wrapper end -->
    <!-- payments wrapper start -->
    <div class="payments_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="sv_heading_wraper half_section_headign">
                        <h4>Payment Methods</h4>
                        <h3>Accepted Payment Method</h3>

                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="payment_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                            <div class="item">

                                <div class="partner_img_wrapper float_left">
                                    <img src="{{ asset('frontend/assets/images/partner1.png') }}" class="img-responsive"
                                        alt="img">
                                </div>

                            </div>
                            <div class="item">

                                <div class="partner_img_wrapper float_left">
                                    <img src="{{ asset('frontend/assets/images/partner2.png') }}" class="img-responsive"
                                        alt="img">
                                </div>

                            </div>
                            <div class="item">

                                <div class="partner_img_wrapper float_left">
                                    <img src="{{ asset('frontend/assets/images/partner3.png') }}" class="img-responsive"
                                        alt="img">
                                </div>

                            </div>
                            <div class="item">

                                <div class="partner_img_wrapper float_left">
                                    <img src="{{ asset('frontend/assets/images/partner4.png') }}" class="img-responsive"
                                        alt="img">
                                </div>

                            </div>
                            <div class="item">

                                <div class="partner_img_wrapper float_left">
                                    <img src="{{ asset('frontend/assets/images/partner2.png') }}" class="img-responsive"
                                        alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- payments wrapper end -->
@endsection
