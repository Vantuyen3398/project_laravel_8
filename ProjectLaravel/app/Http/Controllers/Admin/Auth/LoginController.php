<?php

namespace App\Http\Controllers\Admin\Auth;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.login');
        }

        $remember = $request->remember;
        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $result = DB::table('admins')->where('email', $request->email)->first();
            $request->session()->put('name', $result->name);
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->flush();
        return view('admin.login');
    }
}
