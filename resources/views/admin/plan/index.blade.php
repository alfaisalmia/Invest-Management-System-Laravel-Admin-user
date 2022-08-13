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

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                    <h3 class="card-title"> Manage Plan </h3>
                    <a href="{{route('admin.plan-create')}}" class="btn btn-primary btn-sm" style="float: right"><i class="fa fa-plus"></i>  Add New</a>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead style="background-image: linear-gradient(to bottom, #23a9e1, #0090dc, #0076d4, #005ac6, #073bb3); color:white">
                    <tr>
                      <th scope="col">@lang('Name')</th>
                      <th scope="col">@lang('Invest Limit')</th>
                      <th scope="col">@lang('Status')</th>
                      <th style="float:right">@lang('Action')</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @forelse($plan as $data)
                    <tr>
                  <td>{{$data->name}}</td>
                      <td data-label="@lang('Invest Limit')">
                        @if($data->fixed_amount == 0)
                            <span class="price d-block">$ {{$data->minimum}}
                                - $ {{$data->maximum}}</span>
                        @else
                            <span class="price d-block">$ {{$data->maximum}}</span>
                        @endif
                    </td>
                    <td data-label="@lang('Status')">
                      @if($data->status == 1)
                      <span class="badge bg-success">@lang('Active')</span>
                      @else
                          <span class="badge bg-danger">@lang('In-active')</span>
                      @endif
                  </td>
                  <td data-label="@lang('Action')">
          
                    <a href="{{route('admin.plan-edit',$data->id)}}" class="btn btn-primary btn-sm" style="float: right"><i class="fa fa-edit"></i></a>
               </td>
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