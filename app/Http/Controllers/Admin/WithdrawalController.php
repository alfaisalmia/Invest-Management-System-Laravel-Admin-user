<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdrawal;
use App\Models\GeneralSetting;

class WithdrawalController extends Controller
{
    public function pending()
    {
        $page_title = 'Pending Withdrawals';
        $general_setting = GeneralSetting::first();
        $withdrawals = Withdrawal::where('status', 2)->with(['user', 'method'])->latest()->paginate(getPaginate());
        $empty_message = 'No withdrawal is pending';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message', 'general_setting'));
    }

    public function approved()
    {
        $page_title = 'Approved Withdrawals';
        $general_setting = GeneralSetting::first();
        $withdrawals = Withdrawal::where('status', 1)->with(['user', 'method'])->latest()->paginate(getPaginate());
        $empty_message = 'No withdrawal is approved';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message', 'general_setting'));
    }
    public function rejected()
    {
        $page_title = 'Rejected Withdrawals';
        $general_setting = GeneralSetting::first();
        $withdrawals = Withdrawal::where('status', 3)->with(['user', 'method'])->latest()->paginate(getPaginate());
        $empty_message = 'No withdrawal is rejected';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message', 'general_setting'));
    }
    public function log()
    {
        $page_title = 'Withdrawals Log';
        $general_setting = GeneralSetting::first();
        $withdrawals = Withdrawal::where('status', '!=', 0)->with(['user', 'method'])->latest()->paginate(getPaginate());
        $empty_message = 'No withdrawal history';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message', 'general_setting'));
    }

    public function details($id)
    {
        $general_setting = GeneralSetting::first();
        $withdrawal = Withdrawal::where('id', $id)->where('status', '!=', 0)->with(['user', 'method'])->firstOrFail();
        $page_title = $withdrawal->user->username . ':: Withdraw Requested ' . getAmount($withdrawal->amount) . ' ' . $general_setting->cur_text;
        $details = ($withdrawal->withdraw_information != null) ? json_encode($withdrawal->withdraw_information) : null;
        $methodImage = getImage(imagePath()['withdraw']['method']['path'] . '/' . $withdrawal->method->image,'800x800');
        return view('admin.withdraw.detail', compact('page_title', 'withdrawal', 'details', 'methodImage' , 'general_setting'));
    }
}
