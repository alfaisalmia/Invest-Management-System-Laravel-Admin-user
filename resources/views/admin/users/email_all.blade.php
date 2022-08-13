@extends('layouts.BackendDashboard.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$page_title}}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$page_title}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.users.email.all') }}" method="POST">
                @csrf


                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">@lang('Subject') <span class="text-danger">*</span></label>
                    <input type="text" name="subject" class="form-control" id="exampleInputEmail1" placeholder="Email subject" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">@lang('Message') <span class="text-danger">*</span></label>
                    <textarea name="message" rows="7" class="form-control nicEdit" placeholder="Your message"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="form-row">
                        <div class="form-group col-md-12 text-center">
                            <button type="submit" class="btn btn-block bg-purple mr-2">@lang('Send Email')</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
