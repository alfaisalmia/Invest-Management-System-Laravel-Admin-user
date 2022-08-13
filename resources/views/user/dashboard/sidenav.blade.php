<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
           
                <ul class="pcoded-item pcoded-left-item">
                   
                    <li class=" ">
                        <a href="{{route('user.home')}}">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{route('user.investmentPlan')}}">
                            <span class="pcoded-micon"><i class="feather icon-file-plus"></i></span>
                            <span class="pcoded-mtext">Invest Plans</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{route('user.deposit')}}">
                            <span class="pcoded-micon"><i class="feather icon-move"></i></span>
                            <span class="pcoded-mtext">Deposit Now</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{route('user.myRefferals')}}">
                            <span class="pcoded-micon"><i class="feather icon-share-2"></i></span>
                            <span class="pcoded-mtext">My Referrals</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="menu-bottom.htm">
                            <span class="pcoded-micon"><i class="feather icon-credit-card"></i></span>
                            <span class="pcoded-mtext">Withdrawal Now</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{route('user.transfer.balance')}}">
                            <span class="pcoded-micon"><i class="feather icon-maximize-2"></i></span>
                            <span class="pcoded-mtext">Internal Transfer</span>
                        </a>
                    </li>

                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                            <span class="pcoded-mtext">Transaction logs</span>
                         
                        </a>
                        <ul class="pcoded-submenu">
                         {{--    <li class=" ">
                                <a href="menu-bottom.htm">
                                    <span class="pcoded-mtext">ROI logs</span>
                                </a>
                            </li> --}}
                            <li class=" ">
                                <a href="{{ route('user.plan_log') }}">
                                    <span class="pcoded-mtext">Plan logs</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="{{ route('user.deposit_log') }}">
                                    <span class="pcoded-mtext">Deposit logs</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="menu-bottom.htm">
                                    <span class="pcoded-mtext">Withdrawl logs</span>
                                </a>
                            </li>
                           {{--  <li class=" ">
                                <a href="menu-bottom.htm">
                                    <span class="pcoded-mtext">Commisiion logs</span>
                                </a>
                            </li> --}}
                            <li class=" ">
                                <a href="{{ route('user.interest.log') }}">
                                    <span class="pcoded-mtext">Interest logs</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class=" ">
                        <a href="{{ route('user.ticket') }}">
                            <span class="pcoded-micon"><i class="feather icon-help-circle"></i></span>
                            <span class="pcoded-mtext">Support Ticket</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                            <span class="pcoded-mtext">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                    </li>
             
                </ul>



            </div>
        </nav>
       