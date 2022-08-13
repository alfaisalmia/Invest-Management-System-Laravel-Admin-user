@extends('layouts.BackendDashboard.app')

@push('styles')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('adminLte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <h5>{{ $page_title }}</h5>
                                    </li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group ">
                                                            <label class="form-control-label font-weight-bold">@lang('Site
                                                                Title')</label>
                                                            <input class="form-control  " type="text" name="sitename"
                                                                value="{{ $general->sitename }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-control-label  font-weight-bold">@lang('Currency')</label>
                                                            <input class="form-control   " type="text" name="cur_text"
                                                                value="{{ $general->cur_text }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('Currency
                                                                Symbol')</label>
                                                            <input class="form-control   " type="text" name="cur_sym"
                                                                value="{{ $general->cur_sym }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label> Site Base Color</label>

                                                            <div class="input-group my-colorpicker1 colorpicker-element"
                                                                data-colorpicker-id="1">
                                                                <input type="text" class="form-control"
                                                                    data-original-title="{{$general->base_color}}" title="{{$general->base_color}}" value="{{$general->base_color}}" name="base_color">

                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fas fa-square"
                                                                            style="color: {{$general->base_color}};"></i></span>
                                                                </div>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Site Secondary Color</label>

                                                            <div class="input-group my-colorpicker2 colorpicker-element"
                                                                data-colorpicker-id="2">
                                                                <input type="text" class="form-control"
                                                                    data-original-title="{{$general->secondary_color}}" title="{{$general->secondary_color}}" name="secondary_color" value="{{$general->secondary_color}}">

                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fas fa-square"
                                                                            style="color: {{$general->secondary_color}};"></i></span>
                                                                </div>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label
                                                            class="form-control-label font-weight-bold">@lang('User Registration')</label>
                                                        <input type="checkbox" data-width="100%" data-onstyle="success"
                                                            data-offstyle="danger" data-toggle="toggle" data-on="Enable"
                                                            data-off="Disabled" name="registration" @if($general->registration) checked @endif>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <div class="form-group ">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('Balance
                                                                Transfer Fixed Charge in')
                                                                {{ $general->cur_text }}</label>
                                                            <input class="form-control  " type="text" name="f_charge"
                                                                value="{{ getAmount($general->f_charge) }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group ">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('Balance
                                                                Transfer Percent Charge in') %</label>
                                                            <input class="form-control  " type="text" name="p_charge"
                                                                value="{{ getAmount($general->p_charge) }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('Balance
                                                                Transfer')</label>
                                                            <input type="checkbox" data-width="100%" data-onstyle="success"
                                                                data-offstyle="danger" data-toggle="toggle"
                                                                data-on="Enable" data-off="Disabled" name="b_transfer" @if($general->b_transfer) checked @endif>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group ">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('SIGN UP Bonus Amount') {{ $general->cur_text }}</label>
                                                            <input class="form-control  " type="text" name="signup_bonus_amount"
                                                                value="{{ getAmount($general->signup_bonus_amount) }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('SIGN UP Bonus Control')</label>
                                                            <input type="checkbox" data-width="100%" data-onstyle="success"
                                                                data-offstyle="danger" data-toggle="toggle"
                                                                data-on="Enable" data-off="Disabled" name="signup_bonus_control" @if($general->signup_bonus_control) checked @endif>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('Email Verification')</label>
                                                            <input type="checkbox" data-width="100%" data-onstyle="success"
                                                                data-offstyle="danger" data-toggle="toggle"
                                                                data-on="Enable" data-off="Disabled" name="ev" @if($general->ev) checked @endif>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('Email Notification')</label>
                                                            <input type="checkbox" data-width="100%" data-onstyle="success"
                                                                data-offstyle="danger" data-toggle="toggle"
                                                                data-on="Enable" data-off="Disabled" name="en" @if($general->en) checked @endif>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('SMS Verification')</label>
                                                            <input type="checkbox" data-width="100%" data-onstyle="success"
                                                                data-offstyle="danger" data-toggle="toggle"
                                                                data-on="Enable" data-off="Disabled" name="sv" @if($general->sv) checked @endif>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('SMS Notification')</label>
                                                            <input type="checkbox" data-width="100%" data-onstyle="success"
                                                                data-offstyle="danger" data-toggle="toggle"
                                                                data-on="Enable" data-off="Disabled" name="sn" @if($general->sn) checked @endif>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit"
                                                            class="btn bg-indigo btn-block btn-lg">@lang('Update
                                                            Changes')
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->



            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <script src="{{ asset('adminLte//plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
@endpush
@push('script')
    <script>
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })
        $('.my-colorpicker1').on('colorpickerChange', function(event) {
            $('.my-colorpicker1 .fa-square').css('color', event.color.toString());
        })
    </script>
@endpush
