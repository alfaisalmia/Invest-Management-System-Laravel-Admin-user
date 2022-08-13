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
                                    <a href="{{ route('user.ticket') }}">
                                        <button class="btn btn-success btn-sm"><i
                                                class="icofont icofont-check-circled"></i>View Tickets</button>
                                    </a>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Basic Form Inputs card start -->
                                <div class="card">
                                    <form action="{{route('user.ticket_store')}}" role="form" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-block">
                                            <h4 class="sub-title">Create a new Support</h4>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" value="{{$user->firstname . ' '.$user->lastname}}" readonly required>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-4 col-lg-2 col-form-label">Email</label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="input-group">
                                                        <input type="email" class="form-control" placeholder="Amount"
                                                            name="email" value="{{$user->email}}" readonly required>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-lg-2 col-form-label"> Subject</label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control calculation" placeholder="Subject" name="subject" required value="{{old('subject')}}" >
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-lg-2 col-form-label"> Message</label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="input-group">
                                                        <textarea type="text" class="form-control calculation" placeholder="" name="message" required  rows="12">{{old('message')}}
                                                        </textarea>
                                                        
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="card-footer">
                                            <button class="btn btn-primary btn-block">Submit Now</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
          
