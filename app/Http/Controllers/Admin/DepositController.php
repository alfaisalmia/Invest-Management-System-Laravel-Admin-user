<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\Holiday;
use App\Models\Invest;
use App\Models\Plan;
use App\Models\TimeSetting;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
class DepositController extends Controller
{
    public function pending()
    {
        $page_title = 'Pending Deposits';
        $empty_message = 'No pending deposits.';
        $general_setting = GeneralSetting::first();
        $deposits = Deposit::where('method_code', '>=', 100)->where('status', 2)->with(['user', 'gateway'])->latest()->paginate(getPaginate());
        return view('admin.deposit.log', compact('page_title', 'empty_message', 'deposits', 'general_setting'));
    }

    public function approved()
    {
        $page_title = 'Approved Deposits';
        $empty_message = 'No approved deposits.';
        $general_setting = GeneralSetting::first();
        $deposits = Deposit::where('method_code','>=',100)->where('status', 1)->with(['user', 'gateway'])->latest()->paginate(getPaginate());
        return view('admin.deposit.log', compact('page_title', 'empty_message', 'deposits', 'general_setting'));
    }
    public function successful()
    {
        $page_title = 'Successful Deposits';
        $empty_message = 'No successful deposits.';
        $general_setting = GeneralSetting::first();
        $deposits = Deposit::where('status', 1)->with(['user', 'gateway'])->latest()->paginate(getPaginate());
        return view('admin.deposit.log', compact('page_title', 'empty_message', 'deposits', 'general_setting'));
    }
    public function rejected()
    {
        $page_title = 'Rejected Deposits';
        $empty_message = 'No rejected deposits.';
        $general_setting = GeneralSetting::first();
        $deposits = Deposit::where('method_code', '>=', 100)->where('status', 3)->with(['user', 'gateway'])->latest()->paginate(getPaginate());
        return view('admin.deposit.log', compact('page_title', 'empty_message', 'deposits','general_setting'));
    }
    public function alldeposit()
    {
        $page_title = 'Deposit History';
        $general_setting = GeneralSetting::first();
        $empty_message = 'No deposit history available.';
        $deposits = Deposit::with(['user', 'gateway'])->where('status','!=',0)->latest()->paginate(getPaginate());
        return view('admin.deposit.log', compact('page_title', 'empty_message', 'deposits', 'general_setting'));
    }
}
