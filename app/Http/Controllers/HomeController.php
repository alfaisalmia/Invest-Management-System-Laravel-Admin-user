<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Invest;
use App\Models\Withdrawal;
use App\Models\Deposit;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_title = 'Dashboard';
        $general = GeneralSetting::first();
        // User Info
        $widget['total_users'] = User::count();
        $widget['verified_users'] = User::where('status', 1)->count();
        $widget['sms_unverified_users'] = User::where('sv', 0)->count();
        $widget['email_unverified_users'] = User::where('ev', 0)->count();


        $totalPlan = Plan::count();
        $totalInvest = Invest::sum('amount');

        $totalDepositWallet = User::sum('deposit_wallet');
        $totalInterestWallet = User::sum('interest_wallet');
        //payment
        $payment['total_deposit_amount'] = Deposit::where('status',1)->sum('amount');
        $payment['total_deposit'] = Deposit::where('status',1)->count();
        $payment['total_deposit_charge'] = Deposit::where('status',1)->sum('charge');
        $payment['total_deposit_pending'] = Deposit::where('status',2)->count();


        $paymentWithdraw['total_withdraw'] = Withdrawal::where('status',1)->count();
        $paymentWithdraw['total_withdraw_amount'] = Withdrawal::where('status',1)->sum('amount');
        $paymentWithdraw['total_withdraw_charge'] = Withdrawal::where('status',1)->sum('charge');
        $paymentWithdraw['total_withdraw_pending'] = Withdrawal::where('status',2)->count();

        return view('layouts.BackendDashboard.home', compact('page_title', 'widget', 'totalPlan', 'totalDepositWallet', 'totalInterestWallet','general', 'totalInvest', 'paymentWithdraw', 'payment'));
    }
}
