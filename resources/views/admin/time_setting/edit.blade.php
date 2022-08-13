@extends('layouts.BackendDashboard.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 offset-3" >
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">@lang('Update Time')</h3>
                <a href="{{route('admin.time-setting')}}" class="btn btn-default btn-sm" style="float: right ;color:blue"><i class="fa fa-eye"></i> &nbsp; Time List</a>
              </div>
              <!-- /.card-header -->
           
              <!-- form start -->
              <form method="post" class="form-horizontal" action="{{route('admin.time-update', $time->id)}}">
                @csrf
                @method('put')

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">@lang('Time Name:')</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Time Name" name="name" value="{{$time->name}}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">@lang('Time in Hours')</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Time Hours" value="{{$time->time}}" name="time" required >
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">@lang('Update')</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
