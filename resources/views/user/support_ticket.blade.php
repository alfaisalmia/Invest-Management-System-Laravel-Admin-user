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
                                    <a href="{{ route('user.newticket') }}">
                                        <button class="btn btn-success btn-sm"><i
                                                class="icofont icofont-check-circled"></i>New Ticket</button>
                                    </a>

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
                                                <th>Subject</th>
                                                <th>Status</th>
                                                <th>Last Reply</th>
                                                <th>Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($supports as $k=>$support)
                                                <tr>
                                                    <td> <a href="{{ route('user.ticket_view', $support->ticket) }}" class="font-weight-bold"> [Ticket#{{ $support->ticket }}
                                                         ] {{ $support->subject }} </a></td>
                                                    <td>
                                                        @if($support->status == 0)
                                                        <span class="badge badge-primary py-1 px-2">@lang('Open')</span>
                                                    @elseif($support->status == 1)
                                                        <span class="badge badge-success py-1 px-2">@lang('Answered')</span>
                                                    @elseif($support->status == 2)
                                                        <span class="badge badge-warning py-1 px-2">@lang('Customer reply')</span>
                                                    @elseif($support->status == 3)
                                                        <span class="badge badge-dark py-1 px-2">@lang('Closed')</span>
                                                    @endif
                                                    </td>
                                                    <td>{{ diffForHumans($support->last_reply) }} </td>
                                                    <td>
                                                        <a href="{{ route('user.ticket_view', $support->ticket) }}"><button class="btn btn-danger btn-icon"><i class="feather icon-eye"></i></button> </a></td>



                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-muted text-center" colspan="100%">
                                                        {{ trans($empty_message) }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $supports->links('pagination::bootstrap-4') }}


                                </div>
                            </div>
                        </div>
                        <!-- Table header styling table end -->
                    @endsection
