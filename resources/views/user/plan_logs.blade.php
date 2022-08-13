@extends('user.dashboard.app')
@section('panel')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="mycard-block caption-breadcrumb">
                            <div class="breadcrumb-header">
                                <h5>{{ $page_title }}</h5>
                            </div>
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">

                                    <li class="breadcrumb-item bg-primary"><a href="{{ route('user.investmentPlan') }}" > <button class="btn btn-success btn-sm"><i class="icofont icofont-check-circled"></i>Invest Now</button></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="page-body">

                        <!-- Table header styling table start -->
                        <div class="card">
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-styling table-sm">
                                        <thead>
                                            <tr class="table-primary">
                                                <th>SL</th>
                                                <th>Plan Name</th>
                                                <th>Amount {{ $general_setting->cur_sym }}</th>
                                                <th>RoI</th>
                                                <th>Time Name</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($invests as $k=>$data)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $data->name }} </td>
                                                    <td>Minimum {{ $data->minimum }}   - Max {{ $data->maximum }}</td>
                                                    <td>{{ $data->interest }}
                                                        @if ($data->interest_status == '1')
                                                            %
                                                        @else
                                                           $
                                                        @endif
                                                    </td>
                                                    <td>{{ $data->hours }} / {{ $data->time_name }}</td>

                                                   

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-muted text-center" colspan="100%">
                                                        {{ trans($empty_message) }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $invests->links('pagination::bootstrap-4') }}


                                </div>
                            </div>
                        </div>
                        <!-- Table header styling table end -->
                    @endsection
