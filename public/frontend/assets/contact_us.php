<?php
include_once("header.php") ;
?>
    <!-- inner header wrapper start -->
    <div class="page_title_section">

        <div class="page_header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-9 col-12 col-sm-8">

                        <h1>contact us</h1>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="#"> Home </a>&nbsp; / &nbsp; </li>
                                <li>contact us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner header wrapper end -->
    <!-- map wrapper start -->
    <div class="map_wrapper fixed_portion float_left">
        <div id='map'>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6888618.477635562!2d60.04925756280819!3d32.537276081607665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38db52d2f8fd751f%3A0x46b7a1f7e614925c!2sPakistan!5e0!3m2!1sen!2sbd!4v1644945230258!5m2!1sen!2sbd" width="1400" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <!-- map wrapper end -->
    <!-- contact_wrapper start -->
    <div class="contact_section float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading">
                        <h4> get in touch</h4>
                        <h3>contact us for support</h3>

                    </div>

                </div>
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-pos">
                                    <div class="form-group i-name">

                                        <input type="text" class="form-control require" name="first_name" placeholder="First Name*">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-pos">
                                    <div class="form-group i-name">

                                        <input type="text" class="form-control require" name="last_name" placeholder="last Name*">

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-e">
                                    <div class="form-group i-email">
                                        <label class="sr-only">Email </label>
                                        <input type="email" class="form-control require" name="email" placeholder=" Email *" data-valid="email" data-error="Email should be valid.">

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-s">
                                    <div class="form-group i-subject">

                                        <input type="text" class="form-control require" name="subject" placeholder="subject">

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                            <div class="col-md-12">
                                <div class="form-m">
                                    <div class="form-group i-message">

                                        <textarea class="form-control require" name="message" rows="5" placeholder=" Message"></textarea>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                            <div class="col-md-12">
                                <div class="tb_es_btn_div">
                                    <div class="response"></div>
                                    <div class="tb_es_btn_wrapper conatct_btn2 cont_bnt">
                                        <input type="hidden" name="form_type" value="contact" />
                                        <button type="button" class="submitForm">send message !</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- contact_wrapper end -->
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
                                    <img src="images/partner1.png" class="img-responsive" alt="img">
                                </div>

                            </div>
                            <div class="item">

                                <div class="partner_img_wrapper float_left">
                                    <img src="images/partner2.png" class="img-responsive" alt="img">
                                </div>

                            </div>
                            <div class="item">

                                <div class="partner_img_wrapper float_left">
                                    <img src="images/partner3.png" class="img-responsive" alt="img">
                                </div>

                            </div>
                            <div class="item">

                                <div class="partner_img_wrapper float_left">
                                    <img src="images/partner4.png" class="img-responsive" alt="img">
                                </div>

                            </div>
                            <div class="item">

                                <div class="partner_img_wrapper float_left">
                                    <img src="images/partner2.png" class="img-responsive" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- payments wrapper end -->
    <!-- footer section start-->
  
    <?php
include_once("footer.php") ;
?>