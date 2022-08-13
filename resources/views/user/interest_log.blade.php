@extends('user.dashboard.app')
@section('panel')
    <script>
        "use strict"

        function createCountDown(elementId, sec) {
            var tms = sec;
            var x = setInterval(function() {
                var distance = tms * 1000;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById(elementId).innerHTML = days + "d: " + hours + "h " + minutes + "m " +
                    seconds + "s ";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById(elementId).innerHTML = "COMPLETE";
                }
                tms--;
            }, 1000);
        }
    </script>
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

                        <!-- Table header styling table start -->
                        <div class="card">
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-styling table-striped">
                                        <thead>
                                            <tr class="table-primary">
                                                <th>SL</th>
                                                <th>Plan</th>
                                                <th>Return</th>
                                                <th>Received</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($logs as $k=>$data)
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{ trans(optional($data->plan)->name) }} <br>
                                                        {{ getAmount($data->amount) }}
                                                        {{ __($general_setting->cur_text) }}
                                                    </td>
                                                    <td> {{ getAmount($data->interest) }}
                                                        {{ __($general_setting->cur_text) }} every
                                                        {{ $data->time_name }}


                                                        @if ($data->period == '-1')
                                                            @lang('Lifetime')
                                                        @else
                                                            {{ $data->period }}
                                                            {{ $data->time_name }}
                                                        @endif

                                                        @if ($data->capital_status == '1')
                                                            + @lang('Capital')
                                                        @endif



                                                    </td>
                                                    <td>{{ $data->return_rec_time }}x{{ $data->interest }} =
                                                        {{ $data->return_rec_time * $data->interest }}
                                                        {{ __($general_setting->cur_text) }}</td>


                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-muted text-center" colspan="100%">
                                                        {{ trans($empty_message) }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                      {{ $logs->links('pagination::bootstrap-4') }}
         

                                </div>
                            </div>
                        </div>
                        <!-- Table header styling table end -->
                    @endsection
