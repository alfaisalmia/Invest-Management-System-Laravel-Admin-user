<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Models\Plan;
use App\Models\UserRefferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Invest;
use App\Models\SupportTicket;
use App\Models\TimeSetting;
use Illuminate\Support\Carbon;
use App\Models\Transaction;
use App\Models\Holiday;
use App\Models\AdminNotification;
use App\Models\Referral;
use App\Models\GatewayCurrency;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function home()
    {
        $data['page_title'] = 'Dashboard';
        $general_setting = GeneralSetting::first();
        $data['user'] = Auth::user();
        $data['totalDeposit'] = Deposit::where('user_id', Auth::id())->where('status', 1)->sum('amount');
        $data['totalWithdraw'] = Withdrawal::where('user_id', Auth::id())->whereIn('status', [1])->sum('amount');
        $data['totalInvest'] = Invest::where('user_id', auth()->id())->sum('amount');
        $data['lastWithdraw'] = Withdrawal::where('user_id', Auth::id())->whereIn('status', [1])->latest()->first('amount');
        $data['lastDeposit'] = Deposit::where('user_id', Auth::id())->where('status', 1)->latest()->first('amount');
        $data['totalTicket'] = SupportTicket::where('user_id', Auth::id())->count();
        //$data['transactions'] = $data['user']->transactions->sortByDesc('created_at')->take(1);
        return view('user.dashboard.home', compact('data', 'general_setting'));
    }
    public function investmentPlan()
    {

        $data['page_title'] = "Investment Plan";
        $data['plans'] = Plan::where('status', 1)->get();
        $data['general_setting'] = GeneralSetting::first();
        //$data['planContent'] = getContent('plan.content',true);
        // $data['extend_blade'] =  $this->activeTemplate.'layouts.master';
        return view('user.invest_plan', $data);
    }
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



        /*
        die();
        $page_title = 'Deposit';
        $general_setting = GeneralSetting::first();
        $plan = Plan::where('status', 1)->orderBy('id', 'desc')->get();
        return view('user.deposit', compact('page_title', 'general_setting', 'plan'));
        */
    }

    public function myRefferals()
    {
        $page_title = 'Refferals ';
        $empty_message = 'No refferals data found';
        $general_setting = GeneralSetting::first();
        $userRefferals = UserRefferal::join('users', 'users.id', '=', 'user_referrals.user_id')
            ->join('plans', 'plans.id', '=', 'user_referrals.plan_id')
            ->where('user_referrals.status', '1')
            ->where('user_referrals.refer_by_user_id', Auth::user()->id)
            ->get(['users.firstname', 'users.lastname', 'users.username', 'users.email', 'plans.name', 'user_referrals.created_at']);
        return view('user.refferals', compact('page_title', 'general_setting', 'userRefferals', 'empty_message'));
    }
    public function buyPlan(Request $request)
    {

        $request->validate([
            'amount' => 'required|min:0',
            'plan_id' => 'required',
            'wallet_type' => 'required',
        ]);


        $user = Auth::user();
        $gnl = GeneralSetting::first();
        $plan = Plan::where('id', $request->plan_id)->where('status', 1)->first();
        $wallet = $request->wallet_type;
        if ($wallet != 'deposit_wallet' && $wallet != 'interest_wallet' /* && $wallet != 'checkout' */) {
            $notify[] = ['error', 'Opps! Wallet is not valid'];
            return back()->withNotify($notify);
        }
        $user = auth()->user();

        if (!$plan) {
            $notify[] = ['error', 'Invalid Plan!'];
            return back()->withNotify($notify);
        }
        if ($plan->fixed_amount == '0') {
            if ($request->amount < $plan->minimum) {
                $notify[] = ['error', 'Minimum Invest ' . getAmount($plan->minimum) . ' ' . $gnl->cur_text];
                return back()->withNotify($notify);
            }
            if ($request->amount > $plan->maximum) {
                $notify[] = ['error', 'Maximum Invest ' . getAmount($plan->maximum) . ' ' . $gnl->cur_text];
                return back()->withNotify($notify);
            }
        } else {
            if ($request->amount != $plan->fixed_amount) {
                $notify[] = ['error', 'Please Invest must ' . getAmount($plan->fixed_amount) . ' ' . $gnl->cur_text];
                return back()->withNotify($notify);
            }
        }

        if ($request->amount > $user->$wallet) {
            $notify[] = ['error', 'Insufficient Balance'];
            return back()->withNotify($notify);
        }

        $time_name = TimeSetting::where('time', $plan->times)->first();


        $now = Carbon::now();
        $new_balance = getAmount($user->$wallet - $request->amount);
        $user->$wallet = $new_balance;
        $user->save();

        $baseCurrency =  currency()['fiat'];
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = getAmount($request->amount);
        $transaction->charge = 0;
        $transaction->trx_type = '-';
        $transaction->trx = getTrx();
        $transaction->wallet_type =  $wallet;
        $transaction->details = 'Invested On ' . $plan->name;
        $transaction->post_balance = getAmount($user->$wallet);
        $transaction->save();
        //start
        if ($plan->interest_status == 1) {
            $interest_amount = ($request->amount * $plan->interest) / 100;
        } else {
            $interest_amount = $plan->interest;
        }
        $period = ($plan->lifetime_status == 1) ? '-1' : $plan->repeat_time;
        //end
        $now = Carbon::now();
        $offDay = (array)$gnl->off_day;
        while (0 == 0) {
            $nextPossible = Carbon::parse($now)->addHours($plan->times)->toDateTimeString();
            $dayName = strtolower(date('D', strtotime($nextPossible)));
            $holiday = Holiday::where('date', date('Y-m-d', strtotime($nextPossible)))->count();
            if (!array_key_exists($dayName, $offDay)) {
                if ($holiday == 0) {
                    $next = $nextPossible;
                    break;
                }
            }
            $now = $nextPossible;
        }

        if ($plan->fixed_amount == 0) {

            if ($plan->minimum <= $request->amount && $plan->maximum >= $request->amount) {

                $invest = new Invest();
                $invest->user_id = $user->id;
                $invest->plan_id = $plan->id;
                $invest->amount = $request->amount;
                $invest->interest = $interest_amount;
                $invest->period = $period;
                $invest->time_name = $time_name->name;
                $invest->hours = $plan->times;
                $invest->next_time = $next;
                $invest->status = 1;
                $invest->capital_status = $plan->capital_back_status;
                $invest->trx = getTrx();
                $invest->save();


                if ($gnl->invest_commission == 1) {
                    $commissionType = 'invest';
                    levelCommission($user->id, $request->amount, $commissionType);
                }

                notify($user, $type = 'INVESTMENT_PURCHASE', [
                    'trx' => $invest->trx,
                    'amount' => getAmount($request->amount),
                    'currency' => $gnl->cur_text,
                    'interest_amount' => $interest_amount,
                ]);


                $adminNotification = new AdminNotification();
                $adminNotification->user_id = $user->id;
                $adminNotification->title = $gnl->cur_sym . $request->amount . ' invested to ' . $plan->name;
                $adminNotification->click_url = urlPath('admin.users.invests', $user->id);
                $adminNotification->save();
                $notify[] = ['success', 'Invested Successfully'];
                return redirect()->route('user.interest.log')->withNotify($notify);
            }
            $notify[] = ['error', 'Invalid Amount'];
            return back()->withNotify($notify);
        } else {
            if ($plan->fixed_amount == $request->amount) {

                $invest = new Invest();
                $invest->user_id = $user->id;
                $invest->plan_id = $plan->id;
                $invest->amount = $request->amount;
                $invest->interest = $interest_amount;
                $invest->period = $period;
                $invest->time_name = $time_name->name;
                $invest->hours = $plan->times;
                $invest->next_time = $next;
                $invest->status = 1;
                $invest->capital_status = $plan->capital_back_status;
                $invest->trx = getTrx();
                $invest->save();



                if ($gnl->invest_commission == 1) {
                    $commissionType = 'invest';
                    levelCommission($user->id, $request->amount, $commissionType);
                }
                notify($user, $type = 'INVESTMENT_PURCHASE', [
                    'trx' => $invest->trx,
                    'amount' => getAmount($request->amount),
                    'currency' => $gnl->cur_text,
                    'interest_amount' => $interest_amount,
                ]);
                $user->save();

                $adminNotification = new AdminNotification();
                $adminNotification->user_id = $user->id;
                $adminNotification->title = $gnl->cur_sym . $request->amount . ' invested to ' . $plan->name;
                $adminNotification->click_url = urlPath('admin.users.invests', $user->id);
                $adminNotification->save();

                $notify[] = ['success', 'Package Purchased Successfully Complete'];
                return redirect()->route('user.interest.log')->withNotify($notify);
            }

            $notify[] = ['error', 'Something Went Wrong'];
            return back()->withNotify($notify);
        }
    }
    public function interestLog()
    {
        $general_setting = GeneralSetting::first();
        $page_title = 'Interest log';
        $logs = Invest::where('user_id', Auth::id())->latest()->paginate(10);
        $empty_message = "No result found";
        return view('user.interest_log', compact('page_title', 'logs', 'empty_message', 'general_setting'));
    }

    public function transfer()
    {
        $page_title = 'Transfer Balance';
        $general_setting = GeneralSetting::first();
        if ($general_setting->b_transfer == 0) {
            $notify[] = ['error', 'User Balance Transfer Currently Disabled'];
            return redirect()->route('user.home')->withNotify($notify);
        }
        return view('user.transfer_balance', compact('page_title', 'general_setting'));
    }

    public function transferSubmit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'amount' => 'required|numeric|gt:0',
            'wallet' => 'required|integer',
        ]);
        $user = auth()->user();
        if ($user->username == $request->username) {
            $notify[] = ['error', 'You cannot send money to your won account'];
            return back()->withNotify($notify);
        }
        $receiver = User::where('username', $request->username)->first();
        if (!$receiver) {
            $notify[] = ['error', 'Opps! Receiver not found'];
            return back()->withNotify($notify);
        }
        $gnl = GeneralSetting::first();
        $charge =  $gnl->f_charge + ($request->amount * $gnl->p_charge) / 100;
        $afterCharge = $request->amount + $charge;
        if ($request->wallet == 1) {
            $wallet = 'deposit_wallet';
            $wallet_type = 'Deposit Wallet';
        } elseif ($request->wallet == 2) {
            $wallet = 'interest_wallet';
            $wallet_type = 'Interest Wallet';
        } else {
            $notify[] = ['error', 'Wallet not found'];
            return back()->withNotify($notify);
        }
        if ($user->$wallet < $afterCharge) {
            $notify[] = ['error', 'Opps! You have no sufficient balance to this wallet'];
            return back()->withNotify($notify);
        }
        $user->$wallet -= $afterCharge;
        $user->save();


        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = getAmount($afterCharge);
        $transaction->charge = $charge;
        $transaction->trx_type = '-';
        $transaction->trx = getTrx();
        $transaction->wallet_type =  $wallet;
        $transaction->details = 'Balance Transfer to ' . $receiver->username;
        $transaction->post_balance = getAmount($user->$wallet);
        $transaction->save();

        $receiver->deposit_wallet += $request->amount;
        $receiver->save();


        $transaction = new Transaction();
        $transaction->user_id = $receiver->id;
        $transaction->amount = getAmount($request->amount);
        $transaction->charge = 0;
        $transaction->trx_type = '+';
        $transaction->trx = getTrx();
        $transaction->wallet_type =  'deposit_wallet';
        $transaction->details = 'Balance Received from ' . $user->username;
        $transaction->post_balance = getAmount($user->deposit_wallet);
        $transaction->save();


        notify($user, 'BALANCE_TRANSFER', $shortCodes = [
            'wallet_type' => $wallet_type,
            'amount' => $request->amount,
            'charge' => $charge,
            'afterCharge' => $afterCharge,
            'post_balance' => $user->$wallet,
            'currency' => $gnl->cur_text,
            'receiver' => $receiver->username,
        ]);


        notify($user, 'BALANCE_RECEIVE', $shortCodes = [
            'wallet_type' => 'Deposit Wallet',
            'amount' => $request->amount,
            'post_balance' => $user->deposit_wallet,
            'currency' => $gnl->cur_text,
            'sender' => $user->username,
        ]);


        $notify[] = ['success', 'Balance Transfered Successfully'];
        return back()->withNotify($notify);
    }
    public function depositlog()
    {
        $general_setting = GeneralSetting::first();
        $page_title = 'Deposit log';
        $deposits = Deposit::leftJoin('gateways', 'deposits.method_code', '=', 'gateways.code')->where('deposits.user_id', Auth::user()->id)->select('deposits.*' ,'gateways.name')->orderBy('deposits.id', 'desc') ->paginate(10);
        $empty_message = "No result found";
         return view('user.deposit_log', compact('page_title', 'deposits', 'empty_message', 'general_setting'));
    }

    public function planlog()
    {
        $general_setting = GeneralSetting::first();
        $page_title = 'Plan log';
        $invests = Invest::leftJoin('plans', 'invests.plan_id', '=', 'plans.id')->where('invests.user_id', Auth::user()->id)->select('invests.*' ,'plans.name','plans.minimum','plans.maximum', 'plans.interest','plans.interest_status')->orderBy('invests.id', 'desc') ->paginate(10);
        $empty_message = "No result found";
         return view('user.plan_logs', compact('page_title', 'invests', 'empty_message', 'general_setting'));
    }

    public function changePassword()
    {
        $data['page_title'] = "CHANGE PASSWORD";
        return view('user.password', $data);
    }

    public function submitPassword(Request $request)
    {

        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $user = auth()->user();
            if (Hash::check($request->current_password, $user->password)) {
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                $notify[] = ['success', 'Password Changes successfully.'];
                return back()->withNotify($notify);
            } else {
                $notify[] = ['error', 'Current password not match.'];
                return back()->withNotify($notify);
            }
        } catch (\PDOException $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }
}
