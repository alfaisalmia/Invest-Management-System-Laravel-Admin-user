@extends('layouts.BackendDashboard.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>{{$page_title}}</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('adminLte/dist/img/user4-128x128.jpg')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->fullname}}</h3>

                <p class="text-muted text-center">Joined At <strong>{{showDateTime($user->created_at,'d M, Y h:i A')}}</strong></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Username</b> <a class="float-right">{{$user->username}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Status </b> <a class="float-right">      @switch($user->status)
                        @case(1)
                        <span class="badge bg-success">@lang('Active')</span>
                        @break
                        @case(2)
                        <span class="badge bg--danger">@lang('Banned')</span>
                        @break
                    @endswitch</a>
                  </li>
                  <li class="list-group-item">
                    <b>Deposits Wallet </b> <a class="float-right">$ {{ getAmount($user->deposit_wallet) }}</a>
                  </li>
                  <li class="list-group-item">
                    <b> Interest Wallet </b> <a class="float-right">$ {{ getAmount($user->interest_wallet) }}</a>
                  </li>
                </ul>

               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User action</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                <a data-toggle="modal" href="#addSubModal"  class="btn btn-success btn-block"><b>Add/ Subtract Balance</b></a>
                <a href="#" class="btn btn-primary btn-block"><b>Login logs</b></a>
                <a href="#" class="btn btn-danger btn-block"><b>Send Email</b></a>
                <a href="#" class="btn btn-dark btn-block"><b>Email logs</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                 
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box bg-maroon">
                            <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              
                            <div class="info-box-content">
                              <span class="info-box-text">Total Deposit</span>
                              <span class="info-box-number">{{number_format($totalDeposit,2)}}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box bg-lime">
                            <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
              
                            <div class="info-box-content">
                              <span class="info-box-text">Total Withdraw</span>
                              <span class="info-box-number">{{number_format($totalWithdraw,2)}}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4 col-sm-6 col-12">
                            <a href="#"> 
                          <div class="info-box bg-orange">
                            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
              
                            <div class="info-box-content">
                              <span class="info-box-text">@lang('Total Transaction')</span>
                              <span class="info-box-number">{{$totalTransaction}}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                        </a>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4 col-sm-6 col-12">
                          <div class="info-box bg-gradient- bg-secondary color-palette">
                            <span class="info-box-icon"><i class="fas fa-comments"></i></span>
              
                            <div class="info-box-content">
                              <span class="info-box-text">@lang('Total Invest')</span>
                              <span class="info-box-number">{{$totalInvest}}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                             <!-- /.col -->
                             <div class="col-md-4 col-sm-6 col-12">
                                <a href="#"> 
                              <div class="info-box bg-olive">
                                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                  
                                <div class="info-box-content">
                                  <span class="info-box-text">@lang('Total Referral')</span>
                                  <span class="info-box-number">{{$totalReferral}}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                            </a>
                              <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                                 <!-- /.col -->
                        <div class="col-md-4 col-sm-6 col-12">
                            <a href="#"> 
                          <div class="info-box bg-purple ">
                            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
              
                            <div class="info-box-content">
                              <span class="info-box-text">@lang('Referral Commission')</span>
                              <span class="info-box-number">{{number_format($totalCommission,2)}}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                        </a>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                  </div>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><h5>{{$user->fullname}} @lang('Information')</h5></li>
                   
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <div class="row">
                        <form action="{{route('admin.users.update',[$user->id])}}" method="POST"
                            enctype="multipart/form-data">
                          @csrf
  
                          <div class="col-md-12 col-sm-6 col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('First Name') <span
                                                    class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="firstname"
                                               value="{{$user->firstname}}">
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">@lang('Last Name') <span
                                                    class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="lastname" value="{{$user->lastname}}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('Email') <span
                                                    class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">@lang('Mobile Number') <span
                                                    class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="mobile" value="{{$user->mobile}}">
                                    </div>
                                </div>
                            </div>



                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('Address') </label>
                                        <input class="form-control" type="text" name="address"
                                               value="{{@$user->address->address}}">
                                        <small class="form-text text-muted"><i class="las la-info-circle"></i> @lang('House number, street address')
                                        </small>
                                    </div>
                                </div>
    
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label font-weight-bold">@lang('City') </label>
                                        <input class="form-control" type="text" name="city"
                                               value="{{@$user->address->city}}">
                                    </div>
                                </div>
    
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('State') </label>
                                        <input class="form-control" type="text" name="state"
                                               value="{{@$user->address->state}}">
                                    </div>
                                </div>
    
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('Zip/Postal') </label>
                                        <input class="form-control" type="text" name="state"
                                               value="{{@$user->address->zip}}">
                                    </div>
                                </div>
    
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">@lang('Country') </label>
                                        <select name="country" class="form-control">
                                            @foreach($countries as $key => $country)
                                                <option value="{{ $key }}" @if($country->country == @$user->address->country ) selected @endif>{{ __($country->country) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
    



                            <div class="row">
                                <div class="form-group col-xl-4 col-md-6  col-sm-3 col-12">
                                    <label class="form-control-label font-weight-bold">@lang('Status')</label>
                                    <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Verified"
                                    data-off="Unverified"  name="status" @if($user->status) checked @endif>
                                </div>
    
                                <div class="form-group  col-xl-4 col-md-6  col-sm-3 col-12">
                                    <label class="form-control-label font-weight-bold">@lang('Email Verification') </label>
                                    <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger"
                                           data-toggle="toggle" data-on="Verified" data-off="Unverified" name="ev"
                                           @if($user->ev) checked @endif>
    
                                </div>
    
                                <div class="form-group  col-xl-4 col-md-6  col-sm-3 col-12">
                                    <label class="form-control-label font-weight-bold">@lang('SMS Verification') </label>
                                    <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger"
                                           data-toggle="toggle" data-on="Verified" data-off="Unverified" name="sv"
                                           @if($user->sv) checked @endif>
    
                                </div>
                                <div class="form-group  col-md-6  col-sm-3 col-12">
                                    <label class="form-control-label font-weight-bold">@lang('2FA Status') </label>
                                    <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger"
                                           data-toggle="toggle" data-on="Verified" data-off="Unverified" name="ts"
                                           @if($user->ts) checked @endif>
                                </div>
    
                                <div class="form-group  col-md-6  col-sm-3 col-12">
                                    <label class="form-control-label font-weight-bold">@lang('2FA Verification') </label>
                                    <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger"
                                           data-toggle="toggle" data-on="Verified" data-off="Unverified" name="tv"
                                           @if($user->tv) checked @endif>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg">@lang('Save Changes')
                                        </button>
                                    </div>
                                </div>
    
                            </div>
    



                       



                            <!-- /.info-box -->
                    
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </form>

                    </div>
  
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
          <!-- /.col -->


          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  {{-- Add Sub Balance MODAL --}}
  <div id="addSubModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Add / Subtract Balance')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.users.addSubBalance', $user->id)}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="checkbox" data-width="100%" data-height="44px" data-onstyle="success"
                                   data-offstyle="danger" data-toggle="toggle" data-on="Add Balance"
                                   data-off="@lang('Subtract Balance')" name="act" checked>
                        </div>


                        <div class="form-group col-md-12">
                            <label class="font-weight-bold">@lang('Select Wallet')<span class="text-danger">*</span></label>
                            <select name="wallet" class="form-control" required>
                                <option value="deposit_wallet">@lang('Deposit Wallet')</option>
                                <option value="interest_wallet">@lang('Interest Wallet')</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label>@lang('Amount')<span class="text-danger">*</span></label>
                            <div class="input-group has_append">
                                <input type="text" name="amount" class="form-control"
                                       placeholder="Please provide positive amount">
                                <div class="input-group-append">
                                    <div class="input-group-text"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-success">@lang('Submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>

  @endsection