@extends('layouts.BackendDashboard.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="far fa-user"></i> {{ $page_title }}</h1>
            </div><!-- /.container-fluid -->
        </section>

        <?php
        $image = $general_setting->logo;
        $file = public_path('/adminLte/uploads/logo/' . $image);
        if (file_exists($file)) {
            $image = $general_setting->logo;
        } else {
            $image = 'noimage.png';
        }
        ?>
          @php
          $general = $general_setting;
      @endphp
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">@lang('Withdraw Via') <strong> {{ optional($withdrawal->method)->name }}</strong>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="100%"> <img
                                                    src="{{ asset('adminLte/uploads/logo/') }}/{{ $image }}"
                                                    style="width: 50px; height:50px;" alt="logo"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Date</td>
                                            <td> <span class="font-weight-bold">{{ showDateTime($withdrawal->created_at) }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Trx Number </td>
                                            <td> <span class="font-weight-bold">{{ $withdrawal->trx }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td> <a href="{{ route('admin.users.detail', $withdrawal->user_id) }}">{{ optional($withdrawal->user)->username }}</a></td>
                                        </tr>
                                        <tr>
                                            <td>Method</td>
                                            <td> <span class="font-weight-bold">{{ optional($withdrawal->method)->name}}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Amount</td>
                                            <td><span class="font-weight-bold">{{ getAmount($withdrawal->amount ) }} {{ trans($general->cur_text) }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Charge</td>
                                            <td>  <span
                                                class="font-weight-bold">{{ getAmount($withdrawal->charge ) }} {{ trans($general->cur_text) }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>After Charge</td>
                                            <td> <span
                                                class="font-weight-bold">{{ getAmount($withdrawal->after_charge ) }} {{ trans($general->cur_text) }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Rate</td>
                                            <td>  <span class="font-weight-bold">1 {{trans($general->cur_text)}}
                                                = {{ getAmount($withdrawal->rate ) }} {{$withdrawal->currency}}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Payable</td>
                                            <td>  <span class="font-weight-bold">{{ getAmount($withdrawal->final_amount) }} {{$withdrawal->currency}}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td> @lang('Status')
                                                @if($withdrawal->status == 2)
                                                    <span class="badge badge-pill bg-warning">@lang('Pending')</span>
                                                @elseif($withdrawal->status == 1)
                                                    <span class="badge badge-pill bg-success">@lang('Approved')</span>
                                                @elseif($withdrawal->status == 3)
                                                    <span class="badge badge-pill bg-danger">@lang('Rejected')</span>
                                                @endif</td>
                                        </tr>
                                        @if($withdrawal->admin_feedback)
                                        <tr>
                                            <td> Admin Response 

                                            </td>
                                            <td> <span class="font-weight-bold">{{$withdrawal->admin_feedback}}</span></td>
                                        </tr>
                                        @endif
                                     
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Withdraw Information</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <p>Mobile number</p><br/>0000000000000
                                        </tr>
                                    </thead>
                                   
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
