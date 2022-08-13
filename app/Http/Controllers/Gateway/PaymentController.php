<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminNotification;
use App\Models\Deposit;
use App\Models\GatewayCurrency;
use App\Models\GeneralSetting;
use App\Models\Holiday;
use App\Models\Invest;
use App\Models\Plan;
use App\Models\TimeSetting;
use App\Models\Transaction;
use App\Models\User;
use Session;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function deposit()
    {
        $amount = session()->get('amount');
        $token = session()->get('token');
        $data['general_setting'] = GeneralSetting::first();
        $data['buttonText'] = "Deposit Now";
        $data['totalPayment'] = 0;
        $data['page_title'] = 'Deposit Methods';

        if ($token != null) {
            $plan = Plan::where('id', decrypt($token))->where('status', 1)->first();
            if (!$plan) {
                session()->forget('token');
                session()->forget('amount');
            }
            $data['plan'] = $plan;
            $data['totalPayment'] = decrypt($amount);
            $data['buttonText'] = "Pay Now";
            $data['page_title'] = 'Check Out';
        } else {
            session()->forget('amount');
            session()->forget('token');
        }

        $data['gatewayCurrency'] = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();


        return view('user.payment.deposit', $data);
    }

    public function depositInsert(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'method_code' => 'required',
            'currency' => 'required',
        ]);
        $user = auth()->user();
     
        $gate = GatewayCurrency::where('method_code', $request->method_code)->where('currency', $request->currency)->first();
        if (!$gate) {
            $notify[] = ['error', 'Invalid Gateway'];
            return back()->withNotify($notify);
        }


        $token = session()->get('token');

        if ($token != null) {
            $amount = session()->get('amount');
            $requestAmount = decrypt($amount);
            $plan = Plan::where('id', decrypt($token))->where('status', 1)->first();
            $depo['plan_id'] = $plan->id;
        } else {
            $requestAmount = $request->amount;
        }


        if ($gate->min_amount > $requestAmount || $gate->max_amount < $requestAmount) {
            $notify[] = ['error', 'Please Follow Payment Limit'];
            return back()->withNotify($notify);
        }

        $charge = getAmount($gate->fixed_charge + ($requestAmount * $gate->percent_charge / 100));
        $payable = getAmount($requestAmount + $charge);
        $final_amo = getAmount($payable * $gate->rate);

        $depo['user_id'] = $user->id;
        $depo['method_code'] = $gate->method_code;
        $depo['amount'] = $request->amount;
        $depo['method_currency'] = strtoupper($gate->currency);
        $depo['charge'] = $charge;
        $depo['rate'] = $gate->rate;
        $depo['final_amo'] = getAmount($final_amo);
        $depo['btc_amo'] = 0;
        $depo['btc_wallet'] = "";
        $depo['trx'] = getTrx();
        $depo['try'] = 0;
        $depo['status'] = 0;
        $data = Deposit::create($depo);
        Session::put('Track', $data['trx']);
        return redirect()->route('user.deposit.preview');
    }
    public function depositPreview()
    {

        $track = Session::get('Track');
        $general_setting = GeneralSetting::first();
        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->firstOrFail();
        if (is_null($data)) {
            $notify[] = ['error', 'Invalid Deposit Request'];
            return redirect()->route('user.deposit')->withNotify($notify);
        }
        if ($data->status != 0) {
            $notify[] = ['error', 'Invalid Deposit Request'];
            return redirect()->route('user.deposit')->withNotify($notify);
        }
        $page_title = 'Payment Preview';
        return view('user.payment.preview', compact('data', 'page_title', 'general_setting'));
    }


    public function depositConfirm()
    {
        $track = Session::get('Track');

        $general_setting = GeneralSetting::first();
        $deposit = Deposit::where('trx', $track)->orderBy('id', 'DESC')->with('gateway')->first();
        if (is_null($deposit)) {
            $notify[] = ['error', 'Invalid Deposit Request'];
            return redirect()->route('user.deposit')->withNotify($notify);
        }
        if ($deposit->status != 0) {
            $notify[] = ['error', 'Invalid Deposit Request'];
            return redirect()->route('user.deposit')->withNotify($notify);
        }

        if ($deposit->method_code >= 1000) {
            $this->userDataUpdate($deposit);
            $notify[] = ['success', 'Your deposit request is queued for approval.'];
            return back()->withNotify($notify);
        }


        $dirName = $deposit->gateway->alias; //ex. perfect_money
        $new = __NAMESPACE__ . '\\' . $dirName . '\\ProcessController';  //Gateway\perfect_money\ProcessController"
        $data = $new::process($deposit);
        $data = json_decode($data);
        if (isset($data->redirect)) {
            $notify[] = ['error', $data->message];
            return redirect()->route('user.deposit')->withNotify($notify);
        }
        if (isset($data->redirect)) {
            return redirect($data->url);
        }

        // for Stripe V3
     /*    if (@$data->session) {
            $deposit->btc_wallet = $data->session->id;
            $deposit->save();
        } */
        $page_title = 'Payment Confirm';
        return view($data->view, compact('data', 'page_title', 'deposit', 'general_setting'));
    }
}


