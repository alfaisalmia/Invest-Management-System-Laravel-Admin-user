
@extends('layouts.BackendDashboard.app')

@push('styles')
     <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  @endpush
 


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lists of {{$page_title}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #007bff; color:white">
                    <th >SL</th>
                    <th >User</th>
                    <th>Email-Phone</th>
                    <th>Status</th>
                    <th>Joined At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse($users as $user)
                  <tr>
                      <td>{{ $no++ }}</td>
                    <td>
                        <span class="">{{$user->firstname}} &nbsp;{{$user->lastname}} </span>
                    
                        <span class="small">
                        <a href="{{ route('admin.users.detail', $user->id) }}"><span>@</span>{{ $user->username }}</a>
                        </span>
                    </td>
                    <td>{{ $user->email }} | {{ $user->mobile }}
                    </td>
                    <td> @if($user->status == 1)
                        <span class="badge bg-success">@lang('Active')</span>
                        @else
                            <span class="badge bg-danger">@lang('Banned')</span>
                        @endif</td>
                    <td>  {{ showDateTime($user->created_at) }} [{{ diffForHumans($user->created_at) }}]</td>
                    <td> 
                        <a href="{{ route('admin.users.detail', $user->id) }}" class="btn btn-primary btn-sm" style=""><i class="fa fa-eye"></i></a>

                        
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
<script src="{{ asset('adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminLte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('adminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('adminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('adminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminLte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('adminLte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('adminLte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('adminLte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('adminLte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('adminLte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@endpush
@push('script')
    <script>

    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  @endpush