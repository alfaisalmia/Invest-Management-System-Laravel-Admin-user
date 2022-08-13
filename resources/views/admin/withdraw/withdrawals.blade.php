@extends('layouts.BackendDashboard.app')
@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminLte/dist/css/dataTables.bootstrap5.min.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="far fa-address-card"></i> {{ $page_title }}</h1>
            </div><!-- /.container-fluid -->
        </section>

        @php
            $general = $general_setting;
        @endphp
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 box box-primary">
                        <!-- /.card -->
                        <div class="card box box-primary">
                            <div class="card-header">
                                <h3 class="card-title">Lists of {{ $page_title }}</h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example" class="table is-striped {{-- table-bordered --}}" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th>Gateway | Trx</th>
                                            <th>Initiated</th>
                                            <th>User</th>
                                            <th>Amount</th>
                                            <th>Conversion</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @forelse($withdrawals as $withdraw)
                                        <tr>
                                            <td>
                                                <span class="font-weight-bold">{{ __(@$withdraw->method->name) }}</span>
                                                <br>
                                                <small>{{ $withdraw->trx }}</small>
                                            </td>
                                            <td>
                                                {{ showDateTime($withdraw->created_at) }} <br>
                                                {{ diffForHumans($withdraw->created_at) }}
                                            </td>
                                            <td>
                                                <span class="font-weight-bold">{{ $withdraw->user->fullname }}</span>
                                                <br>
                                                <span class="small"> <a
                                                        href="{{ route('admin.users.detail', $withdraw->user_id) }}"><span>@</span>{{ $withdraw->user->username }}</a>
                                                </span>
                                            </td>
                                            <td>
                                                {{ __($general->cur_sym) }}{{ getAmount($withdraw->amount) }} - <span
                                                    class="text-danger" data-toggle="tooltip"
                                                    data-original-title="@lang('charge')">{{ getAmount($withdraw->charge) }}
                                                </span>
                                                <br>
                                                <strong data-toggle="tooltip"
                                                    data-original-title="@lang('Amount after charge')">
                                                    {{ getAmount($withdraw->amount - $withdraw->charge) }}
                                                    {{ __($general->cur_text) }}
                                                </strong>
                                            </td>
                                            <td>
                                                1 {{ __($general->cur_text) }} =  {{ getAmount($withdraw->rate) }} {{ __($withdraw->currency) }}
                                                <br>
                                                <strong>{{ getAmount($withdraw->final_amount) }} {{ __($withdraw->currency) }}</strong>
                                            </td>

                                            <td>
                                                @if($withdraw->status == 2)
                                                <span class="text--small badge font-weight-normal badge-warning">@lang('Pending')</span>
                                                @elseif($withdraw->status == 1)
                                                <span class="text--small badge font-weight-normal badge-success">@lang('Approved')</span>
                                                <br>{{ diffForHumans($withdraw->updated_at) }}
                                                @elseif($withdraw->status == 3)
                                                <span class="text--small badge font-weight-normal badge-danger">@lang('Rejected')</span>
                                                <br>{{ diffForHumans($withdraw->updated_at) }}
                                                @endif
                                            </td>


                                            <td class=" text-right">
                                                <a class="btn btn-info btn-xs" href="{{ route('admin.withdraw.details', $withdraw->id) }}" data-rel="tooltip"
                                                    data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <tbody>
                                        @empty
                                            <tr>
                                                <td class="text-muted text-center" colspan="100%">
                                                    {{ trans($empty_message) }}</td>
                                            </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="{{ asset('adminLte/dist/js/js_jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminLte/dist/js/js_dataTables.bootstrap5.min.js') }}"></script>



    js_jquery.dataTables.min.js
@endpush
@push('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
