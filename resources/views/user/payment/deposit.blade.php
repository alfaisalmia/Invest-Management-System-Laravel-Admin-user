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
                            @foreach($gatewayCurrency as $data)
                            <!-- user card  start -->
                          
                                <div class="col-md-12 col-lg-4">
                                    <div class="card" style="background-color: #5dda92; color:white">
                                        <div class="card-block text-center">
                                            <img class="media-object img-60"
                                                src="{{ asset('user/assets/images/perfectmoney.png') }}" alt="Perfect Money"
                                                style="width:100%; height: 50px">
                                            <h4 class="m-t-20"><span class="text-c-l">{{__($data->name)}}</span>
                                            </h4>
                                            <h5 class="m-b-20">Limit  <strong> : {{getAmount($data->min_amount)}}
                                                - {{getAmount($data->max_amount)}} {{$general_setting->cur_text}}</strong></h5>
                                            <h5 class="m-b-20">Charge:  <strong>  {{getAmount($data->fixed_charge)}} {{$general_setting->cur_text}}
                                                + {{getAmount($data->percent_charge)}}%</strong></h5>
     
                                                <button type="button"  data-id="{{$data->id}}" data-resource="{{$data}}"
                                                    data-base_symbol="{{$data->baseSymbol()}}"
                                                    class=" btn deposit cmn-btn w-100" data-toggle="modal" data-target="#exampleModal">Deposit Now</button>
                                        </div>
                                    </div>
                                </div>
                
                                @endforeach
                            <!-- user card  end -->
                        </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-bg">
                <div class="modal-header">
                    <strong class="modal-title method-name text-black" id="exampleModalLabel"></strong>
                    <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <form action="{{route('user.deposit.insert')}} " method="post" class="register">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="currency" class="edit-currency" value="">
                            <input type="hidden" name="method_code" class="edit-method-code" value="">
                        </div>
                            @if(session()->get('amount') != null)
                                <input id="amount" type="hidden" class="form-control form-control-lg" name="amount" placeholder="0.00" required autocomplete="off" value="{{decrypt(session()->get('amount'))}}">
                                <h4 class="text-center">@lang('Please Confirm To Pay')</h4>
                             @else
                        <div class="form-group">
                                <label>@lang('Enter Amount'):</label>
                            <div class="input-group">
                                <input id="amount" type="text" class="form-control form-control-lg" name="amount" placeholder="0.00" required autocomplete="off">
                                <div class="input-group-prepend">
                                    <span class="input-group-text currency-addon addon-bg">{{$general_setting->cur_text}}</span>
                                </div>
                            </div>
                        </div>
                            @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn-md cmn-btn">@lang('Next')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
                    @endsection

                    @push('script')
                    <script>
                        $(document).ready(function(){
                            "use strict";
                            $('.deposit').on('click', function () {
                                var id = $(this).data('id');
                                var result = $(this).data('resource');
                                var minAmount = $(this).data('min_amount');
                                var maxAmount = $(this).data('max_amount');
                                var baseSymbol = "{{$general_setting->cur_text}}";
                                var fixCharge = $(this).data('fix_charge');
                                var percentCharge = $(this).data('percent_charge');
                
                                var depositLimit = `@lang('Deposit Limit:') ${minAmount} - ${maxAmount}  ${baseSymbol}`;
                                $('.depositLimit').text(depositLimit);
                                var depositCharge = `@lang('Charge:') ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' +percentCharge + ' % ' : ''}`;
                                $('.depositCharge').text(depositCharge);
                                $('.method-name').text(`@lang('Payment By ') ${result.name}`);
                                $('.currency-addon').text(baseSymbol);
                
                                $('.edit-currency').val(result.currency);
                                $('.edit-method-code').val(result.method_code);
                            });
                        });
                    </script>
                @endpush
                