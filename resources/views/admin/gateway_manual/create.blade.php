
@extends('layouts.BackendDashboard.app')

@push('styles')
     <!-- DataTables -->
    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> --}}
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
     
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 box box-primary">
            <!-- /.card -->
            <div class="card box box-primary">
              <div class="card-header">
                <h3 class="card-title">Lists of {{$page_title}}</h3>
                <a href="{{ route('admin.time-create')}}" class="btn btn-primary btn-sm" style="float: right"><i class="fa fa-plus"></i>  Add New</a>
       
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table is-striped {{-- table-bordered --}}" style="width:100%">
                  
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Gateway</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse($gateways as $data)
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>2011/04/25</td>
                            <td class=" text-right">
                              <a class="btn btn-info btn-xs" href="" data-rel="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a> 
                              <a class="btn btn-success btn-xs" href="" data-rel="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a> 
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">{{ trans($empty_message) }}</td>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>




@endpush
@push('script')
    <script>

	
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>
  @endpush