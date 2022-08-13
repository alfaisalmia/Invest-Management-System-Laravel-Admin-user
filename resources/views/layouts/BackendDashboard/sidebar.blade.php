<?php
use App\Models\GeneralSetting;
$general = GeneralSetting::first();
$image = $general->logo;
$file = public_path('/adminLte/uploads/logo/' . $image);
if (file_exists($file)) {
    $image = $general->logo;
} else {
    $image = 'noimage.png';
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <img src="{{ asset('adminLte/uploads/logo/') }}/{{ $image }}" alt="Fx Intense  Logo" class=""
        style=" width:200px;height: 50px; padding:5px">
    <span class="brand-text font-weight-light">Fx Intense</span>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ URL('admin/dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt lime"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL('admin/referral') }}" class="nav-link">
                        <i class="nav-icon fas fa-th" style="color: #6610f2"></i>
                        <p>
                            Manage Referral
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy" style="color: #ff851b"></i>
                        <p>
                            Plan Manage
                            <i class="fas fa-angle-left right orange"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.time-setting') }}" class="nav-link">
                                <i class="far fa-circle nav-icon orange"></i>
                                <p>Time Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL('admin/plan-setting') }}" class="nav-link">
                                <i class="far fa-circle nav-icon orange"></i>
                                <p>Plan Manage</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie" style="color: #d81b60"></i>
                        <p>
                            Manage Users
                            <i class="right fas fa-angle-left marron"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL('admin/users') }}" class="nav-link">
                                <i class="far fa-circle nav-icon marron"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL('admin/users/active') }}" class="nav-link">
                                <i class="far fa-circle nav-icon marron"></i>
                                <p>Active Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL('admin/users/banned') }}" class="nav-link">
                                <i class="far fa-circle nav-icon marron"></i>
                                <p>Banned Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL('admin/users/email-unverified') }}" class="nav-link">
                                <i class="far fa-circle nav-icon marron"></i>
                                <p>Email Unverified</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL('admin/users/sms-unverified') }}" class="nav-link">
                                <i class="far fa-circle nav-icon marron"></i>
                                <p>SMS Unverified</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL('admin/users/login/history') }}" class="nav-link">
                                <i class="far fa-circle nav-icon marron"></i>
                                <p>Login History</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.email.all') }}" class="nav-link">
                                <i class="far fa-eye nav-icon marron"></i>
                                <p>Send Email</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree fuchsia"></i>
                        <p>
                            Deposit System
                            <i class="fas fa-angle-left right fuchsia"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL('admin/deposit/gateway') }}" class="nav-link">
                                <i class="far fa-circle nav-icon fuchsia"></i>
                                <p>Automatic Gateways</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.deposit_manual_index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon fuchsia"></i>
                                <p>Manual Gateways</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.deposit.pending') }}" class="nav-link">
                                <i class="far fa-circle nav-icon fuchsia"></i>
                                <p>Pending Deposits</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.deposit.approved') }}" class="nav-link">
                                <i class="far fa-circle nav-icon fuchsia"></i>
                                <p>Approved Deposits</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.deposit.successful') }}" class="nav-link">
                                <i class="far fa-circle nav-icon fuchsia"></i>
                                <p>Successful Deposits</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.deposit.rejected') }}" class="nav-link">
                                <i class="far fa-circle nav-icon fuchsia"></i>
                                <p>Rejected Deposits</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.deposit.alldeposit') }}" class="nav-link">
                                <i class="far fa-circle nav-icon fuchsia"></i>
                                <p>All Deposits</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit lime"></i>
                        <p>
                            Withdrawals
                            <i class="fas fa-angle-left right lime"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL('admin/withdraw/method') }}" class="nav-link">
                                <i class="far fa-circle nav-icon lime"></i>
                                <p>Withdraw Methods</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.withdraw.pending') }}" class="nav-link">
                                <i class="far fa-circle nav-icon lime"></i>
                                <p>Pending Log</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.withdraw.approved') }}" class="nav-link">
                                <i class="far fa-circle nav-icon lime"></i>
                                <p>Approved Log</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.withdraw.rejected') }}" class="nav-link">
                                <i class="far fa-circle nav-icon lime"></i>
                                <p>Rejected Log</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.withdraw.log') }}" class="nav-link">
                                <i class="far fa-circle nav-icon lime"></i>
                                <p>Withdrawals Log</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope warning"></i>
                        <p>
                            Tickets
                            <i class="fas fa-angle-left right warning"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon warning"></i>
                                <p>Create a Ticket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon warning"></i>
                                <p>My Tickets</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-header">@lang('Pages')</li>
                <li class="nav-item">
                    <a href="{{ route('admin.setting.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-cogs" style="color: Fuchsia"></i>
                        <p>
                            @lang('Settings')
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.setting.logo-icon') }}" class="nav-link">
                        <i class="nav-icon far fa-image pink"></i>
                        <p>
                            Logo + Icon Setting
                        </p>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            {{ __('Logout') }}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
