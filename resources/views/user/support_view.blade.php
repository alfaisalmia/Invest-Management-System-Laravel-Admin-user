@extends('user.dashboard.app')
@section('panel')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">


                    <!-- Page body start -->
                    <div class="page-body message">
                        <div class="row">
                            <!-- Message section start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-warning">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="txt-white">
                                                    <h4 class="txt-white">
                                                        @if ($my_ticket->status == 0)
                                                            <span
                                                                class="badge badge-success py-2 px-3 txt-white">@lang('Open')</span>
                                                        @elseif($my_ticket->status == 1)
                                                            <span
                                                                class="badge badge-info py-2 px-3">@lang('Answered')</span>
                                                        @elseif($my_ticket->status == 2)
                                                            <span
                                                                class="badge badge-danger py-2 px-3">@lang('Replied')</span>
                                                        @elseif($my_ticket->status == 3)
                                                            <span class="badge badge-dark py-2 px-3">@lang('Closed')</span>
                                                        @endif
                                                        <span class="text-dark">[Ticket#{{ $my_ticket->ticket }}]
                                                            {{ $my_ticket->subject }}</span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <button class="btn btn-danger btn-icon" title="Close Ticket"
                                            data-toggle="modal"
                                            data-target="#DelModal"><i class="feather icon-delete"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 messages-content ">
                                                <div>
                                                    @foreach ($messages as $message)
                                                        @if ($message->admin_id == 0)
                                                            <!-- User --->
                                                            <div class="media">
                                                                <div class="media-left friend-box">
                                                                    <a href="">
                                                                        <h3>{{ Auth::user()->firstname }}
                                                                            {{ Auth::user()->lastname }}</h3>
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <p class="msg-send bg-success">{{$message->message}}</p>
                                                                    <p><i class="icofont icofont-wall-clock f-12"></i> @lang('Posted on') {{ $message->created_at->format('l, dS F Y @ H:i') }}</p>
                                                                </div>
                                                            </div>
                                                            <!-- User --->
                                                        @else
                                                            <!--- Admin//-->
                                                            <div class="media">
                                                                <div class="media-body text-right">
                                                                    <p class="msg-reply bg-info">{{$message->message}}</p>

                                                                    <p><i class="icofont icofont-wall-clock f-12"></i>
                                                                        @lang('Posted on') {{ $message->created_at->format('l, dS F Y @ H:i') }}</p>
                                                                </div>
                                                                <div class="media-right friend-box">
                                                                    <a href="#">
                                                                        <img src="{{ asset('adminLte/uploads/logo/') }}/{{ $general_setting->logo }}"
                                                                            style="width: 178px; height:37px;" alt="logo">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!--- Admin//-->
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <hr>

                                                @if ($my_ticket->status != 4)
                                                <form method="post"
                                                  action="{{ route('user.ticket_reply', $my_ticket->id) }}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                    <div class="messages-send">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <textarea name="message" class="form-control form-control-lg" id="inputMessage" placeholder="@lang('Your Reply') ..." rows="4" cols="10"></textarea>
                                                                <span class="input-group-addon bg-white"
                                                                    id="basic-addon2"><i
                                                                        class="icofont icofont-paper-plane f-18 text-primary"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <input type="hidden" name="replayTicket" value="1"/>
                                                        <button class="btn btn-primary btn-block" >Reply Now</button>
                                                    </div>
                                                </form>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Message section end -->
                        </div>
                    </div>
                    <!-- Page body end -->
                </div>
            </div>
            <!-- Warning Section Starts -->

        </div>
    </div>


<div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-bg">

            <form method="post" action="{{ route('user.ticket_reply', $my_ticket->id) }}">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Confirmation')!</h5>

                    <button type="button" class="close close-button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="text-black">@lang('Are you sure you want to Close This Support Ticket')?</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                        Close
                    </button>

                    <button type="submit" class="btn cmn-btn" name="replayTicket"
                            value="2"><i class="fa fa-check"></i> Confirm
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            "use strict";
            $('.delete-message').on('click', function (e) {
                $('.message_id').val($(this).data('id'));
            });
            $('.extraTicketAttachment').click(function(){
                $("#fileUploadsContainer").append('<input type="file" name="attachments[]" class="form-control mt-1" required />')
            });
        });
    </script>
@endpush