@extends('user.dashboard.app')
@section('panel')






<section class="cmn-section">

    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group text-center">

                            <li class="list-group-item p-prev-list">
                                <img class="media-object "
                                                src="{{ asset('user/assets/images/perfectmoney.png') }}" alt="Perfect Money"
                                                style="width:100%; height: 50px">
                            </li>
                            <p class="list-group-item">
                                @lang('Amount'):
                                <strong>{{getAmount($data->amount)}} </strong> {{$general_setting->cur_text}}
                            </p>
                            <p class="list-group-item">
                                @lang('Charge'):
                                <strong>{{getAmount($data->charge)}}</strong> {{$general_setting->cur_text}}
                            </p>
                            <p class="list-group-item">
                                @lang('Payable'): <strong> {{$data->amount + $data->charge}}</strong> {{$general_setting->cur_text}}
                            </p>
                            <p class="list-group-item">
                                @lang('Conversion Rate'): <strong>1 {{$general_setting->cur_text}} = {{$data->rate +0}}  {{$data->baseCurrency()}}</strong>
                            </p>
                            <p class="list-group-item">
                                @lang('In') {{$data->baseCurrency()}}:
                                <strong>{{getAmount($data->final_amo)}}</strong>
                            </p>
                            @if($data->gateway->crypto==1)
                                <p class="list-group-item">
                                    @lang('Conversion with')
                                    <b> {{ $data->method_currency }}</b> @lang('and final value will Show on next step')
                                </p>
                            @endif
                        </ul>

                        @if($data->method_code<1000)
                        <a href="{{route('user.deposit.confirm')}}" class="btn btn-primary btn-bg btn-round btn-block">@lang('Confirm')</a>
                        @else
                        <a href="{{-- {{route('user.deposit.manual.confirm')}} --}}" class="btn btn-block py-3 font-weight-bold mt-4 cmn-btn">@lang('Confirm')</a>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection


@push('style')
<style type="text/css">
    .p-prev-list img{
        max-width:100px; 
        max-height:100px; 
        margin:0 auto;
    }
</style>
@endpush