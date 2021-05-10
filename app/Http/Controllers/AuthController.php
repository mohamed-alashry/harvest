<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            return redirect(route('admin.leads.index'));
        }

        Flash::error(__('auth.failed'));
        return back();
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('admin.login'));
    }
}
