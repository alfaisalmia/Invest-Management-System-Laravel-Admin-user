@extends('user.dashboard.app')
@section('panel')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>{{ $page_title }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-body">
                        <div class="row">

                            <!-- user card  start -->
                          
                                <div class="col-md-12 col-lg-4">
                                    <div class="card" style="background-color: #5dda92; color:white">
                                        <div class="card-block text-center">
                                            <img class="media-object img-60"
                                                src="{{ asset('user/assets/images/perfectmoney.png') }}" alt="Perfect Money"
                                                style="width:100%; height: 50px">
                                            <h4 class="m-t-20"><span class="text-c-l">Perfect Money</span>
                                            </h4>
                                            <h5 class="m-b-20">Limit <strong> : {{getAmount($data->min_amount)}}
                                                - {{getAmount($data->max_amount)}} {{$general->cur_text}}$</strong></h5>
                                            <h5 class="m-b-20">Charge:  <strong>Free</strong></h5>
                                            <h5 class="m-b-20">Time:<strong>Instant </strong></h5>
                                            <button class="btn btn-primary btn-bg btn-round">Deposit Now</button>
                                        </div>
                                    </div>
                                </div>
                

                            <!-- user card  end -->

                            <!-- user card  start -->
                          
                                <div class="col-md-12 col-lg-4">
                                    <div class="card" style="background-color: #5dda92; color:white">
                                        <div class="card-block text-center">
                                            <img class="media-object img-60"
                                                src="{{ asset('user/assets/images/bitcoin.png') }}" alt="Perfect Money"
                                                style="width:100%; height: 50px">
                                            <h4 class="m-t-20"><span class="text-c-l">Bitcoin /Ethereum</span>
                                            </h4>
                                            <h5 class="m-b-20">Min <strong>100 $</strong></h5>
                                            <h5 class="m-b-20">Charge:  <strong>Free</strong></h5>
                                            <h5 class="m-b-20">Time:<strong>30 Minutes </strong></h5>
                                            <button class="btn btn-primary btn-bg btn-round">Deposit Now</button>
                                        </div>
                                    </div>
                                </div>
                

                            <!-- user card  end -->

                            <!-- user card  start -->
                          
                                <div class="col-md-12 col-lg-4">
                                    <div class="card" style="background-color: #5dda92; color:white">
                                        <div class="card-block text-center">
                                            <img class="media-object img-60"
                                                src="{{ asset('user/assets/images/tether.png') }}" alt="Perfect Money"
                                                style="width:100%; height: 50px">
                                            <h4 class="m-t-20"><span class="text-c-l">USDT (TRC20)</span>
                                            </h4>
                                            <h5 class="m-b-20">Min <strong>100 $</strong></h5>
                                            <h5 class="m-b-20">Charge:  <strong>Free</strong></h5>
                                            <h5 class="m-b-20">Time:<strong>30 Minutes </strong></h5>
                                            <button class="btn btn-primary btn-bg btn-round">Deposit Now</button>
                                        </div>
                                    </div>
                                </div>
                

                            <!-- user card  end -->

                        </div>
                    @endsection
