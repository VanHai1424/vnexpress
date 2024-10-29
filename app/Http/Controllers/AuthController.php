<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('clients.pages.login');
    }

    public function handleLogin(LoginRequest $req) {
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            if(Auth::user()->role === 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->withInput()->with([
                'msg' => 'Tài khoản hoặc mật khẩu không đúng',
                'alert-type' => 'danger'
            ]);
        }
    }

    public function register() {
        return view('clients.pages.register');
    }

    public function handleRegister(RegisterRequest $req) {
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);
        return redirect()->route('login')->with([
            'msg' => 'Đăng ký thành công',
            'alert-type' => 'success'
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

}
