@extends('user.dashboard.app')
@section('panel')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="row mb-none-30">
                                <!-- task, page, download counter  start -->
                                <!--- Single Wallet balance Start-->
                                <div class="col-xl-3 col-md-6 ">
                                    <div class="card bg-c-yellow update-card z-depth-0"
                                        style="  background: linear-gradient(to right, #8e2de2, #4a00e0);">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    @php
                                                  $total=   getAmount( Auth::user()->interest_wallet) + getAmount( Auth::user()->deposit_wallet)                                     @endphp

                                                    <h4 class="text-white">{{ $general_setting->cur_sym }} {{ $total }}</h4>
                                                    <h6 class="text-white m-b-0">My Wallet </h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-1" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <!--- Single Portion End =---->
                                <!--- Single Wallet balance Start-->
                                <div class="col-xl-3 col-md-6 ">
                                    <div class="card bg-c-yellow update-card z-depth-0"
                                        style=" background: linear-gradient(to right, #41295a, #2f0743);">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">{{ $general_setting->cur_sym }}{{ getAmount( Auth::user()->deposit_wallet) }}</h4>
                                                    <h6 class="text-white m-b-0">Deposit Wallet Balance </h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-1" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <!--- Single Portion End =---->
                                <!--- Single Wallet balance Start-->
                                <div class="col-xl-3 col-md-6 ">
                                    <div class="card bg-c-yellow update-card z-depth-0"
                                        style="  background: linear-gradient(to right, #8e2de2, #4a00e0);">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">{{ $general_setting->cur_sym }}{{ getAmount( Auth::user()->interest_wallet) }}</h4>
                                                    <h6 class="text-white m-b-0">RoI Balance</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-1" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                              <?php 
                    /*           echo "<pre>";
                             print_r($data); */
                     
                             ?>
                                <!--- Single Portion End =---->

                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-green update-card "
                                        style="  background: linear-gradient(to right, #f12711, #f5af19);">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">{{ $general_setting->cur_sym }}{{getAmount($data['totalInvest'])}}</h4>
                                                    <h6 class="text-white m-b-0">Total Invests</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-2" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-pink update-card"
                                        style="  background: linear-gradient(to right, #8a2387, #e94057, #f27121)">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">{{ $general_setting->cur_sym }}{{getAmount($data['totalDeposit'])}}</h4>
                                                    <h6 class="text-white m-b-0"> Total Deposit </h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-3" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-lite-green update-card"
                                        style=" background: linear-gradient(to right, #fdc830, #f37335);">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">{{ $general_setting->cur_sym }}{{getAmount($data['totalWithdraw'])}}</h4>
                                                    <h6 class="text-white m-b-0">Total Withdraw</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-4" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <!-- task, page, download counter  end -->

                      
                                <!-- task, page, download counter  start -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-yellow update-card"
                                        style="background: linear-gradient(to right, #da4453, #89216b);">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">{{ $general_setting->cur_sym }} 10</h4>
                                                    <h6 class="text-white m-b-0">Direct Sales</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-1" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-green update-card"
                                        style="background: linear-gradient(to right, #f7971e, #ffd200);">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">4</h4>
                                                    <h6 class="text-white m-b-0">Total Team Sale</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-2" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-pink update-card"
                                        style="background: linear-gradient(to right, #41295a, #2f0743);">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">145</h4>
                                                    <h6 class="text-white m-b-0"><small>Direct Sale Commission</small></h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-3" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-lite-green update-card"
                                        style="background: linear-gradient(to right, #000428, #004e92);">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">{{ $general_setting->cur_sym }} 500</h4>
                                                    <h6 class="text-white m-b-0">Ambassdor Salary</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <canvas id="update-chart-4" height="50"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>



                                <!-- task, page, download counter  end -->

                            </div>
                            <!---Referral Links Start -->
                            <div class="col-md-12 mb-4">
                                <label>@lang('Referral Link')</label>
                                <div class="input-group">
                                    <input type="text" name="text" class="form-control" id="referralURL"
                                        value="{{ route('user.refer.register', [Auth::user()->username]) }}" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text copytext copyBoard" id="copyBoard"> <i
                                                class="fa fa-copy"></i> </span>
                                    </div>
                                </div>
                            </div>
                            <!---Referral Links End -->
                            >
                        @endsection
                        @push('style')
                            <style type="text/css">
                                #copyBoard {
                                    cursor: pointer;
                                }

                            </style>
                        @endpush
                        @push('script')
                            <script>
                                $('.copyBoard').click(function() {
                                    "use strict";
                                    var copyText = document.getElementById("referralURL");
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999);
                                    /*For mobile devices*/
                                    document.execCommand("copy");
                                    iziToast.success({
                                        message: "Copied: " + copyText.value,
                                        position: "topRight"
                                    });
                                });
                            </script>
                        @endpush
