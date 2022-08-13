@extends('layouts.frontendTemplate.app')

@section('content')

<!-- inner header wrapper start -->
<div class="page_title_section">

    <div class="page_header">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-md-9 col-12 col-sm-8">

                    <h1>register</h1>
                </div>
                <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="#"> Home </a>&nbsp; / &nbsp; </li>
                            <li>register</li>
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
                    <div class="login_banner_wrapper register_banner_wrapper">
                        <img src="{{ asset('frontend/assets/images/logo.png')}}" alt="logo" style="width: 200px; height:55px;">
                        <div class="about_btn  facebook_wrap float_left">

                            <a href="#">login with facebook <i class="fab fa-facebook-f"></i></a>

                        </div>
                        <div class="about_btn google_wrap float_left">

                            <a href="#">login with pinterest <i class="fab fa-pinterest-p"></i></a>

                        </div>
                        <div class="jp_regis_center_tag_wrapper jb_register_red_or">
                            <h1>OR</h1>
                        </div>
                    </div>
                    <form action="{{ route('user.register')}}" class="mt-4" onsubmit="return submitUserForm();" method="post">
                        @csrf
                    <div class="login_form_wrapper register_wrapper">
                        <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">

                            <h3> Register To Enter</h3>

                        </div>
                            <div class="form-group icon_form comments_form register_contact">
                  
                                <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" placeholder="@lang('First Name')" required>
                         
                        </div>
                        <div class="form-group icon_form comments_form register_contact">

                            <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" placeholder="@lang('Last Name')" required>
                         
                        </div>
                    
                        <div class="select_box register_contact form-group">                             
                            <select name="country" id="country" class="form-control">
                                @foreach($countries as $key => $country)
                                    <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                                @endforeach
                            </select>
                             </div>	
                         <div class="form-group icon_form comments_form register_contact">

                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text mobile-code">
                                                            
                                    </span>
                                    <input type="hidden" name="mobile_code">
                                </div>
                                <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" placeholder="@lang('Your Phone Number')" required>
                            </div>
                          
                        </div>
                        <div class="form-group icon_form comments_form register_contact">

                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="@lang('Enter email address')" required>
                          
                        </div>
                        <div class="form-group icon_form comments_form register_contact">

                            <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="@lang('User Name')" required>
                         
                        </div>
                        <div class="form-group icon_form comments_form register_contact">

                            <input type="password" name="password" class="form-control" placeholder="@lang('Enter password')" required>
                         
                        </div>
                        <div class="form-group icon_form comments_form register_contact">

                            <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('Confirm Password')" required>
                          
                        </div>
                     
                        <div class="login_remember_box">
                            <label class="control control--checkbox">I agreed to the Terms and Conditions. 
                                <input type="checkbox">
                                <span class="control__indicator"></span>
                            </label>
                          
                        </div>
                        <div class="about_btn login_btn register_btn float_left">

                            <button type="submit" class="cmn-btn">@lang('SignUp Now')</button>
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
                                <img src="{{ asset('frontend/assets/images/partner1.png')}}" class="img-responsive" alt="img">
                            </div>

                        </div>
                        <div class="item">

                            <div class="partner_img_wrapper float_left">
                                <img src="{{ asset('frontend/assets/images/partner2.png')}}" class="img-responsive" alt="img">
                            </div>

                        </div>
                        <div class="item">

                            <div class="partner_img_wrapper float_left">
                                <img src="{{ asset('frontend/assets/images/partner3.png')}}" class="img-responsive" alt="img">
                            </div>

                        </div>
                        <div class="item">

                            <div class="partner_img_wrapper float_left">
                                <img src="{{ asset('frontend/assets/images/partner4.png')}}" class="img-responsive" alt="img">
                            </div>

                        </div>
                        <div class="item">

                            <div class="partner_img_wrapper float_left">
                                <img src="{{ asset('frontend/assets/images/partner2.png')}}" class="img-responsive" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $mobile_code; ?>
<!-- payments wrapper end -->
@endsection


@push('script')
    <script>
      "use strict";
          @if($mobile_code)
          $(`option[data-code={{ $mobile_code }}]`).attr('selected','');
          @endif

          $('select[name=country]').change(function(){
              $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
              $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
          });
          $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
          $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
@endpush