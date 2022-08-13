@extends('user.dashboard.app')
@section('panel')

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-heade">
                        <div class="mycard-block caption-breadcrumb">
                            <div class="breadcrumb-header">
                                <h5>{{ $page_title }}</h5>
                            </div>
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                   
                                    <li class="breadcrumb-item bg-primary"><a href="{{ route('user.deposit') }}" style="color: white">Deposit Now</a>
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
                                                <th>Method Name</th>
                                                <th>Amount</th>
                                                <th>Final Amount</th>
                                                <th>Transaction No</th>
                                                <th>Status</th>
                                                <th>Created At</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($deposits as $k=>$data)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $data->name }} </td>
                                                    <td>{{ $data->amount }} </td>
                                                    <td>{{ $data->final_amo }} </td>
                                                    <td>{{ $data->trx }} </td>
                                                    <td>
                                                        
                                                        <div class="label-main">
                                                            @if ( $data->status  == '0')
                                                            <label class="label label-warning">Pending</label>
                                                            @elseif ($data->status == '1')
                                                            <label class="label label-success">Success</label>
                                                            @elseif(($data->status == '3'))
                                                            <label class="label label-danger">Cancel</label>
                                                            @endif
                                                    
                                                    </td>
                                                    <td>{{ $data->created_at->format('d/m/Y') }}</td>


                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-muted text-center" colspan="100%">
                                                        {{ trans($empty_message) }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                      {{ $deposits->links('pagination::bootstrap-4') }}
         

                                </div>
                            </div>
                        </div>
                        <!-- Table header styling table end -->
                    @endsection
