@extends('user.dashboard.app')
@section('panel')
    @php
    $general = $general_setting;
    @endphp
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
                            <div class="col-sm-12">
                                <!-- Basic Form Inputs card start -->
                                <div class="card">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-block">
                                            <h4 class="sub-title">Transfer Balance</h4>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Wallet</label>
                                                <div class="col-sm-10">
                                                    <select name="wallet" class="form-control">
                                                        <option value="1">@lang('Deposit Wallet')</option>
                                                        <option value="2">@lang('Interest Wallet')</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Username</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="username">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-4 col-lg-2 col-form-label">Amount<br /><small
                                                        class="text-danger">( @lang('Charge'):
                                                        {{ getAmount($general->f_charge) }} {{ $general->cur_text }} +
                                                        {{ getAmount($general->p_charge) }}% )</small></label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Amount"
                                                            name="amount">
                                                        <span class="input-group-addon"
                                                            id="basic-addon3">{{ $general->cur_text }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-lg-2 col-form-label"> Amount Will Cut From Your
                                                    Account </label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control calculation" placeholder=""
                                                            readonly>
                                                        <span class="input-group-addon"
                                                            id="basic-addon3">{{ $general->cur_text }}</span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="card-footer">
                                            <button class="btn btn-primary btn-block">Transfer</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
            @push('script')
                <script type="text/javascript">
                    $('input[name=amount]').on('input', function() {
                        var amo = parseFloat($(this).val());
                        var calculation = amo + (parseFloat({{ $general->f_charge }}) + (amo * parseFloat(
                            {{ $general->p_charge }})) / 100);
                        $('.calculation').val(calculation);
                    });
                </script>
            @endpush
