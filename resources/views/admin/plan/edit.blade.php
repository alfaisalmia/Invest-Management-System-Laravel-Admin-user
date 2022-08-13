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
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@lang('Update Plan')</h3>
                                <a href="{{ route('admin.plan-setting') }}" class="btn btn-default btn-sm"
                                    style="float: right ;color:blue"><i class="fa fa-eye"></i> &nbsp; Plan List</a>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form method="post" class="form-horizontal" action="{{route('admin.plan-update', $plan->id)}}">
                                @csrf
                                @method('put')
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">@lang('Plan Name')</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    value="{{$plan->name}}" name="name" required>
                                            </div>
                                        </div>
                                   {{--    <div class="col-md-3">
                                            <label for="validationCustomUsername">Amount Type</label>
                                            <div class="" style="width: 232px">
                                                <input type="checkbox"  data-toggle="toggle" data-on="Fixed"
                                                    data-off="Range" data-onstyle="success" data-offstyle="danger"
                                                    style="width: 232px" id="amount" class="amount"
                                                    name="amount_type" {{$plan->fixed_amount != 0 ? 'checked': '0'}} value="1" >

                                            </div>
                                        </div> --}} 
                                        <div class="col-md-3 offman form-group">
                                            <label for="validationCustomUsername">Minimum Amount</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">$</span>
                                                </div>
                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    placeholder="" aria-describedby="inputGroupPrepend" name="minimum" value="{{$plan->minimum}}">

                                            </div>
                                        </div>
                                        <div class="form-group offman col-md-3">
                                            <label for="validationCustomUsername">Maximum Amount</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">$</span>
                                                </div>
                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    value="{{$plan->maximum}}" aria-describedby="inputGroupPrepend" name="maximum">

                                            </div>
                                        </div>
                                         <div class="form-group onman col-md-3 d-none">
                                            <label for="validationCustomUsername">Amount</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">$</span>
                                                </div>
                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    value="{{$plan->fixed_amount}}" aria-describedby="inputGroupPrepend" name="amount">

                                            </div>
                                        </div> 
                                        <div class="col-md-3">
                                            <label for="validationCustomUsername">Return/ Interest</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    value="{{$plan->interest}}" aria-describedby="inputGroupPrepend" name="interest"
                                                    required>
                                                <div class="input-group-append height-47">
                                                    <div class="input-group-text" style="padding: 0px 0px">
                                                        <select name="interest_status" class="form-control"
                                                            style="height: 35px !important;">
                                                            <option {{$plan->interest_status == '1'? 'selected': ''}} value="%">
                                                                %
                                                            </option>
                                                            <option
                                                                {{$plan->interest_status == '0'? 'selected': ''}} value="$">$</option>
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
                                                    <option
                                                        {{$plan->times == $data->time? 'selected': ''}} value="{{$data->time}}">{{$data->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustomUsername">Return For</label>
                                            <div class="" style="width: 232px">
                                                <input type="checkbox"  data-toggle="toggle" data-on="Period"
                                                    data-off="Lifetime" data-onstyle="success" data-offstyle="danger"
                                                    style="width: 232px" id="lifetime" class="lifetime" name="lifetime_status"  @if($plan->lifetime_status) checked @endif>

                                            </div>
                                        </div>
                                        <div class="col-md-3 return ">
                                            <label for="validationCustomUsername">How Many Times</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    value="{{$plan->repeat_time}}" aria-describedby="inputGroupPrepend" name="repeat_time">

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustomUsername">Capital Back</label>
                                            <div class="" style="width: 232px">
                                                <input type="checkbox"  data-toggle="toggle" data-on="Yes"
                                                    data-off="No" data-onstyle="success" data-offstyle="danger"
                                                    style="width: 232px" name="capital_back_status"  @if($plan->capital_back_status) checked @endif>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustomUsername">Status</label>
                                            <div class="" style="width: 232px">
                                                <input type="checkbox" data-toggle="toggle" data-on="Active"
                                                    data-off="Disable" data-onstyle="success" data-offstyle="danger"
                                                    data-on="Active" data-off="Disable" data-width="100%" type="checkbox"
                                                    name="status" @if($plan->status) checked @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustomUsername">Featured</label>
                                            <div class="" style="width: 232px">
                                                <input type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger"
                                                    style="width: 232px" name="featured"  @if($plan->sfeaturedatus) checked @endif> 

                                            </div>
                                        </div>

                                    </div>




                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
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
  {{--   <script>
        $(function ($) {
            "use strict";
            $(document).ready(function () {
                if ($('#amount').prop('checked') == false) {
                    $('.offman').addClass('d-block');
                    $('.offman').removeClass('d-none');

                    $('.onman').addClass('d-none');
                    $('.onman').removeClass('d-block');
                } else {
                    $('.offman').addClass('d-none');
                    $('.offman').removeClass('d-block');

                    $('.onman').addClass('d-block');
                    $('.onman').removeClass('d-none');
                }

                if ($('#lifetime').prop('checked') == true) {
                    $('.return').addClass('d-block');
                    $('.return').removeClass('d-none');
                } else {
                    $('.return').addClass('d-none');
                    $('.return').removeClass('d-block');
                }


                $('#amount').on('change', function () {
                    var isCheck = $(this).prop('checked');
                    if (isCheck == false) {
                        $('.offman').addClass('d-block');
                        $('.offman').removeClass('d-none');

                        $('.onman').addClass('d-none');
                        $('.onman').removeClass('d-block');
                    } else {
                        $('.offman').addClass('d-none');
                        $('.offman').removeClass('d-block');

                        $('.onman').addClass('d-block');
                        $('.onman').removeClass('d-none');
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
            })

        });
    </script> --}}
@endpush