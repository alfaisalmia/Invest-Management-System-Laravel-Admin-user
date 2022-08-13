<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class AdminController extends Controller
{
    public function adminlogin(){
        return view('admin.login');

    }
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]); 
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->route('admin.dashboard');
        } else {
            session()->flash('error', 'Either Email/ Password is incorrect !');
            return back()->withInput($request->only('email'));
        }
    }
}
