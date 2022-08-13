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
          <div class="col-md-12">
            @if (session('status'))
            <script>
              Swal.fire("{{ session('status') }}");
            </script>
        @endif
        {!! Toastr::message() !!}
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                    <h3 class="card-title"> Manage Time Settings </h3>
                    <a href="{{ route('admin.time-create')}}" class="btn btn-primary btn-sm" style="float: right"><i class="fa fa-plus"></i>  Add New</a>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead style="background-image: linear-gradient(to bottom, #23a9e1, #0090dc, #0076d4, #005ac6, #073bb3); color:white">
                    <tr>
                      <th>Name</th>
                      <th>Time</th>
                      <th style="width: 180px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($team as $data)
                    <tr>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->time }} @lang('Hours')</td>
                      <td><a href="{{route('admin.time-edit',$data->id)}}" class="btn btn-primary btn-sm" style="float: right"><i class="fa fa-edit"></i> &nbsp; Edit</a></td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-muted text-center" colspan="100%">@lang('Data Not Found')</td>
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

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection