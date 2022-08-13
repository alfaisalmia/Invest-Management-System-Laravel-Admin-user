@extends('layouts.BackendDashboard.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12" >
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">@lang(' Create New Plan')</h3>
                <a href="{{route('admin.plan-setting')}}" class="btn btn-default btn-sm" style="float: right ;color:blue"><i class="fa fa-eye"></i> &nbsp; Plan List</a>
              </div>
              <!-- /.card-header -->
           
              <!-- form start -->
              <form method="post" class="form-horizontal" action="{{route('admin.plan-store')}}">
                @csrf
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">@lang('Plan Name:')</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" required>
                      </div>
                    </div>
            {{--         <div class="col-md-3">
                        <label for="validationCustomUsername">Amount Type</label>
                        <div class="" style="width: 232px">
                          <input type="checkbox" checked data-toggle="toggle" data-on="Fixed" data-off="Range" data-onstyle="success" data-offstyle="danger" style="width: 232px" id="amount" class="amount" name="amount_type">
                          
                        </div>
                    </div> --}}
                    <div class="col-md-3 offman">
                        <label for="validationCustomUsername">Minimum Amount</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">$</span>
                          </div>
                          <input type="text" class="form-control" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" name="minimum">
                          
                        </div>
                    </div>
                    <div class="col-md-3 offman">
                        <label for="validationCustomUsername">Maximum Amount</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">$</span>
                          </div>
                          <input type="text" class="form-control" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" name="maximum">
                          
                        </div>
                    </div>
                {{--     <div class="col-md-3 onman d-none">
                        <label for="validationCustomUsername">Amount</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">$</span>
                          </div>
                          <input type="text" class="form-control" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" name="amount">
                          
                        </div>
                    </div> --}}
                    <div class="col-md-3">
                        <label for="validationCustomUsername">Return/ Interest</label>
                        <div class="input-group">

                          <input type="text" class="form-control" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" name="interest" required>
                          <div class="input-group-append height-47">
                            <div class="input-group-text" style="padding: 0px 0px">
                                <select name="interest_status" class="form-control" style="height: 35px !important;">
                                    <option value="%">%</option>
                                    <option value="$">$</option>
                                </select>
                            </div>
                        </div>
                          
                        </div>
                    </div>
                    <div class="col-md-3"> 
                   
                        <!-- select -->
                        <div class="form-group">
                          <label>Every</label>
                          <select class="form-control" name="times">
                            @foreach($time as $data)
                            <option value="{{$data->time}}">{{trans($data->name)}}</option>
                        @endforeach
                          </select>
                        </div>
                   
                    </div>
                    <div class="col-md-3">
                      <label for="validationCustomUsername">Return For</label>
                      <div class="" style="width: 232px">
                        <input type="checkbox" checked data-toggle="toggle" data-on="Period" data-off="Lifetime" data-onstyle="success" data-offstyle="danger" style="width: 232px" id="lifetime" class="lifetime" name="lifetime_status">
                        
                      </div>
                  </div>
                  <div class="col-md-3 return">
                    <label for="validationCustomUsername">How Many Times</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" name="repeat_time">
                      
                    </div>
                </div>
                    <div class="col-md-3">
                      <label for="validationCustomUsername">Capital Back</label>
                      <div class="" style="width: 232px">
                        <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" style="width: 232px" name="capital_back_status">
                        
                      </div>
                  </div>
                    <div class="col-md-3">
                      <label for="validationCustomUsername">Status</label>
                      <div class="" style="width: 232px">
                        <input type="checkbox" checked data-toggle="toggle" data-on="Active" data-off="Disable" data-onstyle="success" data-offstyle="danger" style="width: 232px" name="status" >
                        
                      </div>
                  </div>
                    <div class="col-md-3">
                      <label for="validationCustomUsername">Featured</label>
                      <div class="" style="width: 232px">
                        <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" style="width: 232px"  name="featured">
                        
                      </div>
                  </div>

                  </div>
                  

                  

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">@lang('Save')</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection


  @push('script')
    <script>
        $(function ($) {
            "use strict";
            $('#amount').on('change', function () {
                var isCheck = $(this).prop('checked');
                if (isCheck == false) {
                    $('.offman').addClass('d-block');
                    $('.offman').removeClass('d-none');

                    $('.onman').addClass('d-none');
                    $('.onman').removeClass('d-block');
                } else {
                   $('.offman').addClass('d-none');
                    $('.onman').addClass('d-block'); 
                }
            });

            $('#lifetime').on('change', function () {
                var isCheck = $(this).prop('checked');
                if (isCheck == true) {
                    $('.return').addClass('d-block');
                    $('.return').removeClass('d-none');
                } else {
                    $('.return').addClass('d-none');

                    $('.return').removeClass('d-block');
                }
            });

        });
    </script>
@endpush