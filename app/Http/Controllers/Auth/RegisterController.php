<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
    /*     return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]); */
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $gnl = GeneralSetting::first();
        $referBy = session()->get('reference');
        if ($referBy != null) {
            $referUser = User::where('username', $referBy)->first();
        } else {
            $referUser = null;
        }  

        $user = new User();
        $user->firstname = isset($data['firstname']) ? $data['firstname'] : null;
        $user->lastname = isset($data['lastname']) ? $data['lastname'] : null;
        $user->email = strtolower(trim($data['email']));
        $user->password = Hash::make($data['password']);
        $user->username = trim($data['username']);
        $user->ref_by = ($referUser != null) ? $referUser->id : null;
        $user->mobile = $data['mobile_code'].$data['mobile'];
 /*        $user->address = [
            'address' => '',
            'state' => '',
            'zip' => '',
            'country' => isset($data['country']) ? $data['country'] : null,
            'city' => ''
        ]; */

        if($gnl->signup_bonus_control == 1){
            $user->deposit_wallet += getAmount($gnl->signup_bonus_amount);
        }

        $user->status = 1;
        $user->ev = $gnl->ev ? 0 : 1;
        $user->sv = $gnl->sv ? 0 : 1;
        $user->ts = 0;
        $user->tv = 1;

        $user->save();
        if($gnl->signup_bonus_control == 1){
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = getAmount($gnl->signup_bonus_amount);
        $transaction->charge = 0;
        $transaction->post_balance = getAmount($user->deposit_wallet);
        $transaction->trx_type = '+';
        $transaction->trx =  getTrx();
        $transaction->wallet_type = 'deposit_wallet';
        $transaction->details = 'You have got Sign Up Bonus';
        $transaction->save();
        }
    }

    public function showRegistrationForm()
    {
        $page_title = "Sign Up";
        $info = json_decode(json_encode(getIpInfo()), true);
        $mobile_code = @implode(',', $info['code']);
        $countries = json_decode(file_get_contents(resource_path('views/partials/country.json')));
        return view('auth.register', compact('page_title', 'mobile_code', 'countries'));
    }

    public function register(Request $request)
    {

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return redirect()->route('user.login');


        /*
        dd($request->mobile);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');

        /*  $this->validator($request->all())->validate();
        dd($request->mobile);
        die();


        $exist = User::where('mobile', $request->mobile_code . $request->mobile)->first();
        if ($exist) {
            $notify[] = ['error', 'The mobile number already exists'];
            return back()->withNotify($notify)->withInput();
        }

        if (isset($request->captcha)) {
            if (!captchaVerify($request->captcha, $request->captcha_secret)) {
                $notify[] = ['error', "Invalid Captcha"];
                return back()->withNotify($notify)->withInput();
            }
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath()); */
    }
}
