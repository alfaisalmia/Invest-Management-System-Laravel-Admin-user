 @extends('layouts.BackendDashboard.app')
 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Dashboard</h1>
                     </div><!-- /.col -->
                 </div><!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <section class="content">
             <div class="container-fluid">
                 <!-- Small boxes (Stat box) -->
                 <div class="row">
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-primary">
                             <div class="inner">
                                 <h3>{{ $widget['total_users'] }}</h3>

                                 <p>Total Users</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-bag"></i>
                             </div>
                             <a href="{{ URL('admin/users') }}" class="small-box-footer">View All <i
                                     class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-indigo">
                             <div class="inner">
                                 <h3>{{ $widget['verified_users'] }}<sup style="font-size: 20px"></sup></h3>
                                 <p>Total Verified Users</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-stats-bars"></i>
                             </div>
                             <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-fuchsia">
                             <div class="inner">
                                 <h3>{{ $widget['email_unverified_users'] }}</h3>
                                 <p>Total Email Unverified Users</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-person-add"></i>
                             </div>
                             <a href="{{ URL('admin/users/email-unverified') }}" class="small-box-footer">View All<i
                                     class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-lime">
                             <div class="inner">
                                 <h3>{{ $widget['sms_unverified_users'] }}</h3>

                                 <p>Total SMS Unverified Users</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-pie-graph"></i>
                             </div>
                             <a href="{{ URL('admin/users/sms-unverified') }}" class="small-box-footer">View All <i
                                     class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                 </div>
                 <!-- /.row -->
                 <div class="row">
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-orange">
                             <div class="inner">
                                 <h3>$ {{ @number_format($totalDepositWallet, 2) }} </h3>

                                 <p>User Deposit Wallet</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-network"></i>
                             </div>
                             <a href="#" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-maroon">
                             <div class="inner">
                                 <h3>$ {{ @number_format($totalInterestWallet, 2) }} <sup style="font-size: 20px"></sup>
                                 </h3>

                                 <p>User Interest Wallet </p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-levels"></i>
                             </div>
                             <a href="#" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-purple">
                             <div class="inner">
                                 <h3>{{ $totalPlan }}</h3>

                                 <p>Total Plan</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-arrow-graph-up-right"></i>
                             </div>
                             <a href="{{ URL('admin/plan-setting') }}" class="small-box-footer">View All <i
                                     class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-olive">
                             <div class="inner">
                                 <h3> {{ number_format($totalInvest, 2) }} {{ $general->cur_sym }}</h3>

                                 <p>Total Investment</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-checkmark-round"></i>
                             </div>
                             <a href="#" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                 </div>

                 <div class="row">
                     <!-- Left col -->
                     <div class="col-lg-7 connectedSortable">
                         <!-- Custom tabs (Charts with tabs)-->
                         <div class="card">
                             <div class="card-header">
                                 <h3 class="card-title">
                                     <i class="fas fa-chart-pie mr-1"></i>
                                     Sales
                                 </h3>
                                 <div class="card-tools">
                                     <ul class="nav nav-pills ml-auto">
                                         <li class="nav-item">
                                             <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                         </li>
                                     </ul>
                                 </div>
                             </div><!-- /.card-header -->
                             <div class="card-body">
                                 <div class="tab-content p-0">
                                     <!-- Morris chart - Sales -->
                                     <div class="chart tab-pane active" id="revenue-chart"
                                         style="position: relative; height: 300px;">
                                         <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                     </div>
                                     <div class="chart tab-pane" id="sales-chart"
                                         style="position: relative; height: 300px;">
                                         <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                     </div>
                                 </div>
                             </div><!-- /.card-body -->
                         </div>
                         <!-- /.card -->



                     </div>
                     <!-- /.Left col -->
                     <!-- right col (We are only adding the ID to make the widgets sortable)-->
                     <div class="col-lg-5 connectedSortable">


                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                          <div class="info-box">
                              <span class="info-box-icon bg-primary"><i class="fas fa-money-check"></i></span>

                              <div class="info-box-content">
                                  <span class="info-box-text">Total Deposit Amount</span>
                                  <span class="info-box-number">{{getAmount($payment['total_deposit_amount'])}} {{trans($general->cur_text)}}</span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                      </div>
                      <div class="col-md-6 col-sm-6 col-lg-6">
                          <div class="info-box">
                              <span class="info-box-icon bg-info"><i class="fas fa-money-bill-alt"></i></span>

                              <div class="info-box-content">
                                  <span class="info-box-text">Total Deposit </span>
                                  <span class="info-box-number">{{$payment['total_deposit']}}</span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                      </div>
                     
                      <div class="col-md-6 col-sm-6 col-lg-6">
                          <div class="info-box">
                              <span class="info-box-icon bg-lime"><i class="fas fa-money-bill"></i></span>

                              <div class="info-box-content">
                                  <span class="info-box-text">Pending Deposit</span>
                                  <span class="info-box-number">{{$payment['total_deposit_pending']}}</span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                      </div>

                      <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-purple"><i class="fas fa-money-check-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Dep. Charge</span>
                                <span class="info-box-number">{{getAmount($payment['total_deposit_charge'])}} {{trans($general->cur_text)}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                      </div>
                         



                     </div>
                     <!-- right col -->
                 </div>
                 <div class="row">
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-danger">
                             <div class="inner">
                                 <h3>{{$paymentWithdraw['total_withdraw']}}</h3>

                                 <p>Total Withdraw</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-network"></i>
                             </div>
                             <a href="#" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-warning">
                             <div class="inner">
                                 <h3><span class="amount">{{getAmount($paymentWithdraw['total_withdraw_amount'])}}</span>
                                  <span class="currency-sign">{{$general->cur_text}}</span> </h3>

                                 <p>Total Withdral Amount </p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-levels"></i>
                             </div>
                             <a href="#" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-success">
                             <div class="inner">
                                 <h3> <span class="amount">{{getAmount($paymentWithdraw['total_withdraw_charge'])}} </span>
                                  <span class="currency-sign">{{trans($general->cur_text)}}</span></h3>

                                 <p>Total Withdraw Charge</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-arrow-graph-up-right"></i>
                             </div>
                             <a href="#" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-primary">
                             <div class="inner">
                                 <h3> <span class="amount">{{$paymentWithdraw['total_withdraw_pending']}}</span></h3>

                                 <p>Withdraw Pending</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-checkmark-round"></i>
                             </div>
                             <a href="#" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                 </div>

                 <!-- /.row -->
             </div>
         </section>





     </div>
     <!-- /.content-header -->
 @endsection
