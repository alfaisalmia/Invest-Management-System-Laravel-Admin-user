@extends('layouts.BackendDashboard.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>{{ $page_title }}</h4>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Upoad Your Logo</h3>
                                </div>
                                <!-- /.card-header -->
                                <?php
                                $image = $general_setting->logo;
                                $file = public_path('/adminLte/uploads/logo/' . $image);
                                if (file_exists($file)) {
                                    $image = $general_setting->logo;
                                } else {
                                    $image = 'noimage.png';
                                }
                                ?>
                                <div class="card-body">
                                    <div>
                                        <h4>Logo Preview</h4>
                                        <div class="preview">
                                            <img src="{{ asset('adminLte/uploads/logo/') }}/{{ $image }}"
                                                style="width: 280px; height:100px;" alt="logo">
                                        </div>
                                    </div>
                                    <br />
                                    <div class="form-group">
                                        <label for="exampleInputFile">Logo upload</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    accept=".png, .jpg, .jpeg" name="logo">
                                                <label class="custom-file-label bg-maroon" for="exampleInputFile">Select
                                                    Logo</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $fav = $general_setting->favicon;
                            $file = public_path('/adminLte/uploads/logo/' . $fav);
                            if (file_exists($file)) {
                                $fav = $general_setting->favicon;
                            } else {
                                $fav = 'noimage.png';
                            }
                            ?>
                        </div>
                        <!-- form start -->
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Upoad Your icon</h3>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <div>
                                        <h4>Favicon Preview</h4>
                                        <div class="preview">
                                            <img src="{{ asset('adminLte/uploads/logo/') }}/{{ $fav }}"
                                                style="width: 280px; height:100px;" alt="logo">
                                        </div>
                                    </div>
                                    <br />


                                    <div class="form-group">
                                        <label for="exampleInputFile">Select Favicon</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    accept=".png" name="favicon">
                                                <label class="custom-file-label bg-lime" for="exampleInputFile">Select
                                                    Favicon</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- form start -->

                        <!--/.col (left) -->
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn bg-indigo btn-block btn-sm">@lang('Update
                                    Changes')
                                </button>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
