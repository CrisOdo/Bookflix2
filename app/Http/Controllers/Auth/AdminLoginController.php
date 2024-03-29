<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector\Back;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');   
    }

    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin.dashboard'));            
        }

        return redirect(route('admin.login'));
    }
}
