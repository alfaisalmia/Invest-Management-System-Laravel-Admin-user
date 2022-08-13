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
                            <style>
                                .user-widget-card .card-block {
                                    padding: 2.95rem 1.25rem 2.85rem;
                                }

                                .mt-4 {
                                    margin-top: 1px !important;
                                    margin-left: 49px;
                                }

                            </style>
                            <!-- user card  start -->
                            @foreach ($plans as $k => $data)
                                <div class="col-md-6 col-xl-3">
                                    <div
                                        class="card user-widget-card @if ($data->id % 2 == 0) bg-c-blue @else bg-c-green @endif">
                                        <div class="card-block">
                                            <i class="feather icon-home bg-simple-c-blue card1-icon"></i>
                                            <h4>{{ @$data->name }}</h4><br />
                                            <h5>{{ $general_setting->cur_sym }}{{ $data->minimum }} -
                                                {{ $general_setting->cur_sym }}{{ $data->maximum }} </h5>
                                            <h5>Rate of Interest : {{ $data->interest }}</h5>
                                            <h6>Duration : {{ $data->times }}</h6><br />


                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#depoModal"
                                                data-resource="{{ $data }}"
                                                class="more-info cmn-btn btn-md mt-4 investButton">@lang('Invest Now')</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- user card  end -->

                        </div>

                        @push('renderModal')
                            <!-- Modal -->
                            <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">

                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-bg">
                                        <div class="modal-header">
                                            <strong class="modal-title text-black" id="ModalLabel">
                                                @guest
                                                    At first sign in your account
                                                @else
                                                    Confirm to invest on <span class="planName"></span>
                                                @endguest
                                            </strong>
                                            <a href="javascript:void(0)" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        <form action="{{route('user.buy.plan')}}" method="post" class="register">
                                            @csrf
                                            @auth
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <h6 class="text-center investAmountRenge"></h6>

                                                        <p class="text-center mt-1 interestDetails"></p>
                                                        <p class="text-center interestValidaty"></p>

                                                        <div class="form-group ">
                                                            <strong class="text-black mb-2 d-block">@lang('Select wallet')</strong>
                                                            <select class="form-control" name="wallet_type">
                                                                <option value="deposit_wallet">@lang('Deposit Wallet -
                                                                    '.$general_setting->cur_sym.getAmount(auth()->user()->deposit_wallet))
                                                                </option>
                                                                <option value="interest_wallet">@lang('Interest Wallet
                                                                    -'.$general_setting->cur_sym.getAmount(auth()->user()->interest_wallet))
                                                                </option>
                                                               {{--  <option value="checkout">@lang('Checkout')</option> --}}
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="plan_id" class="plan_id">

                                                        <div class="form-group">
                                                            <strong class="text-black mb-2 d-block">@lang('Invest Amount')</strong>
                                                            <input type="text" class="form-control fixedAmount" id="fixedAmount"
                                                                name="amount" value="{{ old('amount') }}"
                                                                onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger action-btn"
                                                        data-dismiss="modal">@lang('No')</button>
                                                    <button type="submit" class="btn btn-primary action-btn">@lang('Yes')</button>
                                                </div>
                                            @endauth

                                            @guest
                                                <div class="modal-footer">
                                                    <a href="{{ route('user.login') }}" type="button"
                                                        class="cmn-btn btn-md w-100 text-center">@lang('At first sign in your
                                                        account')</a>
                                                </div>
                                            @endguest
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endpush
                    @endsection

                    @push('script')
                        <script>
                            (function($) {
                                "use strict";
                                $(document).on('click', '.investButton', function() {
                                    var data = $(this).data('resource');
                                    var symbol = "{{ __($general_setting->cur_sym) }}";
                                    var currency = "{{ __($general_setting->cur_text) }}";

                                    $('#mySelect').empty();

                                    if (data.fixed_amount == '0') {
                                        $('.investAmountRenge').text(
                                            `@lang('Invest'): ${symbol}${data.minimum} - ${symbol}${data.maximum}`);
                                        $('.fixedAmount').val('');
                                        $('#fixedAmount').attr('readonly', false);


                                    } else {
                                        $('.investAmountRenge').text(`@lang('invest'): ${symbol}${data.fixed_amount}`);
                                        $('.fixedAmount').val(data.fixed_amount);
                                        $('#fixedAmount').attr('readonly', true);

                                    }

                                    if (data.interest_status == '1') {
                                        $('.interestDetails').html(`<strong> @lang('Interest'): ${data.interest} % </strong>`);
                                    } else {
                                        $('.interestDetails').html(
                                            `<strong> @lang('Interest'): ${data.interest} ${currency}  </strong>`);
                                    }
                                    if (data.lifetime_status == '0') {
                                        $('.interestValidaty').html(
                                            `<strong>  @lang('per') ${data.times} @lang('hours') ,  ${data.repeat_time} @lang('times')</strong>`
                                        );
                                    } else {
                                        $('.interestValidaty').html(
                                            `<strong>  @lang('per') ${data.times} @lang('hours'),  @lang('life time') </strong>`
                                        );
                                    }

                                    $('.planName').text(data.name);
                                    $('.plan_id').val(data.id);
                                });



                            })(jQuery);
                        </script>
                    @endpush
