<?php
include('header.php')
?>
    <!-- inner header wrapper start -->
    <div class="page_title_section">

        <div class="page_header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-9 col-12 col-sm-8">

                        <h1>Investment plan </h1>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="#"> Home </a>&nbsp; / &nbsp; </li>
                                <li>Investment </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner header wrapper end -->
    <!--investment plan wrapper start -->
    <div class="sv_pricing_paln fixed_portion  float_left">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading">

                        <h4> our plans </h4>
                        <h3> Our Investment Plans </h3>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
                    <div class="investment_box_wrapper sv_pricing_border float_left">
                        <div class="investment_icon_circle">
                            <i class="flaticon-bar-chart"></i>
                        </div>
                        <div class="investment_border_wrapper"></div>
                        <div class="investment_content_wrapper">
                            <h1><a href="#">silver plan</a></h1>
                            <p>Up to 5% for 20 Hourly
                                <br> Compound Available
                                <br> Down to 5% for 20 Hourly
                                <br> Principal Return
                                <br> Up to 5% for 20 Hourly</p>
                        </div>
                        <div class="about_btn plans_btn">
                            <ul>
                                <li>
                                    <a href="#">invest now</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
                    <div class="investment_box_wrapper sv_pricing_border float_left">
                        <div class="investment_icon_circle red_info_circle">
                            <i class="flaticon-money"></i>
                        </div>
                        <div class="investment_border_wrapper red_border_wrapper"></div>
                        <div class="investment_content_wrapper red_content_wrapper">
                            <h1><a href="#">Bronze Plan</a></h1>
                            <p>Up to 5% Daily for 5 Days
                                <br> Min deposit: $2020
                                <br> Max deposit: $101010
                                <br> Principal Return
                                <br> Compound Available</p>
                        </div>
                        <div class="about_btn plans_btn red_btn_plans">
                            <ul>
                                <li>
                                <a href="#">invest now</a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
                    <div class="investment_box_wrapper sv_pricing_border float_left">
                        <div class="investment_icon_circle blue_icon_circle">
                            <i class="flaticon-gold"></i>
                        </div>
                        <div class="investment_border_wrapper blue_border_wrapper"></div>
                        <div class="investment_content_wrapper blue_content_wrapper">
                            <h1><a href="#">copper plan</a></h1>
                            <p>Up to 3% Hourly for 10 Hourly
                                <br> Min deposit: $300
                                <br> Max deposit: $3000
                                <br> Principal Not Return
                                <br> Compound Not Available</p>
                        </div>
                        <div class="about_btn plans_btn blue_btn_plans">
                            <ul>
                                <li>
                                <a href="#">invest now</a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 col-12">
                    <div class="investment_box_wrapper sv_pricing_border float_left">
                        <div class="investment_icon_circle green_info_circle">
                            <i class="flaticon-medal"></i>
                        </div>
                        <div class="investment_border_wrapper green_border_wrapper"></div>
                        <div class="investment_content_wrapper green_content_wrapper">
                            <h1><a href="#">gold plan</a></h1>
                            <p>Up to 7% for 30 days
                                <br> Min deposit: $500
                                <br> Max deposit: $3000
                                <br> Principal Not Return
                                <br> Compound Available</p>
                        </div>
                        <div class="about_btn plans_btn green_plan_btn">
                            <ul>
                                <li>
                                <a href="#">invest now</a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--investment plan wrapper end -->
  
    <!--calculator plan wrapper start -->
    <div class="calculator_wrapper float_left">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading">
                        <h4> plans calculator </h4>
                        <h3> How Much Can You Save With Plans? </h3>

                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-12 calc">
                    <div class="calculator_portion float_left">
                        <div class="caluclator_text_wrapper">
                            <p>deposit amount : <i class="fas fa-info-circle"></i></p>
                            <p class="dollar_wrap"><i class="fa fa-dollar-sign"></i>
                                <input type="text" id="investmentAmount" />
                            </p>
                        </div>
                        <div class="caluclator_text_wrapper">
                            <p>monthly SIP : <i class="fas fa-info-circle"></i></p>
                            <p class="dollar_wrap"><i class="fa fa-dollar-sign"></i>
                                <input type="text" id="investmentAmountSIP" />
                            </p>
                        </div>

                        <div class="caluclator_text_wrapper">
                            <p>Investment Year : <i class="fas fa-info-circle"></i></p>
                            <select class="custom-select" id="investmentYears">
                                <option selected value="5">5 Years</option>
                                <option value="10">10 Years</option>
                                <option value="15">15 Years</option>
                                <option value="20">20 Years</option>
                                <option value="25">25 Years</option>
                            </select>
                        </div>

                        <div class="about_btn calc_btn float_left" onclick="CalCommission(); return false;">
                            <ul>
                                <li>
                                    <a href="#">calculate profit</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 calc">
                    <div class="mutualfunds-calculator">
                        <div class="calculator">
                            <div class="graph-area">
                                <span class="mf-yAxis">Investment Value</span>
                                <svg width="480" height="350" id="graph" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 480 355" class="mf-chart">

                                    <defs>
                                        <pattern id="grid" x="10" y="10" width="480" height="88" patternUnits="userSpaceOnUse">
                                            <line x1="0" y1="0" x2="100%" y2="0" stroke-width="1" shape-rendering="crispEdges" stroke="#bdbdbd"></line>
                                        </pattern>
                                    </defs>
                                    <rect width="480" height="355" style="fill:transparent;"></rect>
                                    <g>
                                        <path d="M 5,330
            C 5,330
            300,257.5
            475,170" id="path1" fill="none" stroke="#bdbdbd" stroke-width="5px" stroke-linecap="round" class="anim-path" style="transition: stroke-dashoffset 2s ease-in-out; stroke-dasharray: 522.957, 522.957; stroke-dashoffset: 0px; display: inline;"></path>
                                        <path d="M 5,330
            C 5,330
            300,257.5
            475,20" fill="none" id="path2" stroke="#05a4cd" stroke-width="5px" stroke-linecap="round" class="anim-path" style="transition: stroke-dashoffset 2s ease-in-out; stroke-dasharray: 572.872, 572.872; stroke-dashoffset: 0px; display: inline;"></path>
                                    </g>
                                    <g class="mf-circles" style="">
                                        <circle cx="472" cy="22" r="8" fill="#05a4cd" stroke="#f9f9f7" stroke-width="3px"></circle>
                                        <circle cx="472" cy="170" r="8" fill="#bdbdbd" stroke="#f9f9f7" stroke-width="3px"></circle>
                                    </g>
                                </svg>
                                <div class="mf-xAxis">

                                    <span class="mf-xAxis-end" id="years_selected">25 Years</span>
                                </div>
                                <div class="labels funds_label" style="display: block;">
                                    <div class="chart-label">
                                        <span class="amt" id="directFund"><i class="fa fa-dollar-sign"></i>1.98 Cr</span>
                                        <span class="sub">total returns</span>
                                    </div>
                                    <div class="chart-label label-regular">
                                        <span class="amt" id="regularFund"><i class="fa fa-dollar-sign"></i>1.64 Cr</span>
                                        <span class="sub">investment amounts</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calc-amt">
                        <p class="calc-price" id="returnAmount">$ 34.06 L</p>
                        <p>extra returns for you </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- FAQ wrapper start -->
<div class="faq_wrapper float_left">
        <div class="investment_overlay faq_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_dark index2_heading  index2_heading_center">
                        <h4>FAQ section</h4>
                        <h3>Frequently Asked Questions</h3>
                        <div class="line_shape"></div>
                    </div>
                </div>
            </div>
            <div id="accordion" role="tablist">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">

                        <div class="card">

                            <!-- Card Title -->
                            <div class="card_pagee" role="tab" id="headingOne">
                                <h5 class="h5-md">
								       		<a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">
								         		How can i get help by inbound marketing?
								        	</a>
								    	 </h5>
                            </div>

                            <!-- Card Content -->
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac1.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">

                            <div class="card_pagee" role="tab" id="headingTwo">
                                <h5 class="h5-md">
								       	    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
								          		What about loan programs?
								        	</a>
								     	 </h5>
                            </div>

                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac2.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">

                            <div class="card_pagee" role="tab" id="headingThree">
                                <h5 class="h5-md">
								        	<a class="collapsed" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
								         		Our Happy Clients
								        	</a>
								     	 </h5>
                            </div>

                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac3.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">

                            <div class="card_pagee" role="tab" id="heading4">
                                <h5 class="h5-md">
								        	<a class="collapsed" data-toggle="collapse" href="#collapse41" role="button" aria-expanded="false" aria-controls="collapse41">
								         		Get Training From Experts
								        	</a>
								     	 </h5>
                            </div>

                            <div id="collapse41" class="collapse" role="tabpanel" aria-labelledby="heading4" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac1.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">

                            <div class="card_pagee" role="tab" id="heading7">
                                <h5 class="h5-md">
								        	<a class="collapsed" data-toggle="collapse" href="#collapseT" role="button" aria-expanded="false" aria-controls="collapseT">
								         		User Guide: Getting Started
								        	</a>
								     	 </h5>
                            </div>

                            <div id="collapseT" class="collapse" role="tabpanel" aria-labelledby="heading7" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac3.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">

                        <div class="card">

                            <!-- Card Title -->
                            <div class="card_pagee" role="tab" id="headingfour">
                                <h5 class="h5-md">
								       		 <a class="collapsed" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
								         		What about loan programs?
								        	</a>
								    	 </h5>
                            </div>

                            <!-- Card Content -->
                            <div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="headingfour" data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac1.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">

                            <div class="card_pagee" role="tab" id="headingfive">
                                <h5 class="h5-md">
								       	    <a class="collapsed" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
								          	Unlimited Features & Unique Layouts
								        	</a>
								     	 </h5>
                            </div>

                            <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="headingfive" data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac2.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">

                            <div class="card_pagee" role="tab" id="headingnine">
                                <h5 class="h5-md">
								       	    <a class="collapsed" data-toggle="collapse" href="#collapse02" role="button" aria-expanded="false" aria-controls="collapse02">
								          Clean and Unique
								        	</a>
								     	 </h5>
                            </div>

                            <div id="collapse02" class="collapse" role="tabpanel" aria-labelledby="headingnine" data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac2.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">

                            <div class="card_pagee" role="tab" id="headingten">
                                <h5 class="h5-md">
								       	    <a class="collapsed" data-toggle="collapse" href="#collapse092" role="button" aria-expanded="false" aria-controls="collapse092">
								        Deeply Customisable Theme
								        	</a>
								     	 </h5>
                            </div>

                            <div id="collapse092" class="collapse" role="tabpanel" aria-labelledby="headingten" data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac2.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">

                            <div class="card_pagee" role="tab" id="headingsiz">
                                <h5 class="h5-md">
								        	<a class="collapsed" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
								         		How do I use the features ?
								        	</a>
								     	 </h5>
                            </div>

                            <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="headingsiz" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac3.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">

                            <div class="card_pagee" role="tab" id="headingseven">
                                <h5 class="h5-md">
								        	<a class="collapsed" data-toggle="collapse" href="#collapse31" role="button" aria-expanded="false" aria-controls="collapse31">
								         	Pixel perfect and responsive
								        	</a>
								     	 </h5>
                            </div>

                            <div id="collapse31" class="collapse" role="tabpanel" aria-labelledby="headingseven" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac2.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">

                            <div class="card_pagee" role="tab" id="headingeight">
                                <h5 class="h5-md">
								        	<a class="collapsed" data-toggle="collapse" href="#collapse32" role="button" aria-expanded="false" aria-controls="collapse32">
								         		Imagination Is The Beginning
								        	</a>
								     	 </h5>
                            </div>

                            <div id="collapse32" class="collapse" role="tabpanel" aria-labelledby="headingeight" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="card_img">
                                        <img src="images/ac1.jpg" alt="img">
                                    </div>
                                    <div class="card_cntnt">
                                        <p>Morbi accumsan ipsum velit. Nam nec aks tel lus a odio tincidunt auctor. Proi gravida nibh vel velit auctor.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="about_btn calc_btn faqq_btn float_left">
                    <ul>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal">ask questions ?</a>
                        </li>
                    </ul>
                </div>
                <div class="modal fade question_modal" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="sv_question_pop float_left">
                                        <h1>ask questions ? </h1>
                                        <div class="search_alert_box float_left">

                                            <div class="apply_job_form">

                                                <input type="text" name="full_name" placeholder="full name">
                                            </div>
                                            <div class="apply_job_form">

                                                <input type="text" name="Email" placeholder="Enter Your Email">
                                            </div>
                                            <div class="apply_job_form">

                                                <input type="text" name="subject" placeholder="your question">
                                            </div>
                                            <div class="apply_job_form">
                                                <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="question_sec float_left">
                                            <div class="about_btn calc_btn faqq_btn ques_Btn">
                                                <ul>
                                                    <li>
                                                        <a href="#">apply now</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="cancel_wrapper">
                                                <a href="#" class="" data-dismiss="modal">cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ wrapper end -->
    <!--calculator plan wrapper end -->
    <?php
    include('footer.php');