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
                            <div class="col-sm-12">
                                <!-- Basic Form Inputs card start -->
                                <div class="card">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-block">
                                            <h4 class="sub-title">Change Password</h4>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Enter Old Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" name="current_password">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-4 col-lg-2 col-form-label">Enter New Password<br /></label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" 
                                                            name="password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-lg-2 col-form-label"> Re-type Password</label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control calculation" name="password_confirmation"
                                                            >
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="card-footer">
                                            <button class="btn btn-primary btn-block">Update</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection

