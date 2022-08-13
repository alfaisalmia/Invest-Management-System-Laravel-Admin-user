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
                    
                            <!-- Table header styling table start -->
                            <div class="card">
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-styling table-striped" >
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>SL</th>
                                                    <th>Referral Name</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Plan Name</th>
                                                    <th>Joining Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($userRefferals as $item)
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{$item->firstname}} {{$item->firstname}}</td>
                                                    <td>{{$item->username}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{ showDateTime($item->created_at) }}</td>
                                       
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td class="text-muted text-center" colspan="100%">{{ trans($empty_message) }}</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Table header styling table end -->
                 
                    @endsection
