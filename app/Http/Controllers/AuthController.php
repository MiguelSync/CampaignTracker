<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Auth;

class AuthController extends Controller
{

    public function showRegisterForm() {
        return view('auth.register');
    }
    
    public function showLoginForm() {
        return view('auth.login');
    }

    public function register(RegisterRequest $request) {
        $credentials = $request->validated();

        User::create([
            'name'     => $credentials['name'],
            'email'    => $credentials['email'],
            'password' => $credentials['password'],
        ]);

        return redirect()->intended('auth.login');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            /** @todo Redirect to Campaing view when it´s done */
            // return redirect()->intended('');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }
}
