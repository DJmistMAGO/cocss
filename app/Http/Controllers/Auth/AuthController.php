<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function verify(Request $request)
    {
        $rules = [
            'sorsu_email' => [
                'required',
                'email',
                'ends_with:@sorsu.edu.ph'
            ],
            'password' => [
                'required'
            ],
        ];

        $messages = [
            'sorsu_email.ends_with' => 'The email must end with @sorsu.edu.ph',
        ];

        $credentials = $request->validate($rules, $messages);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return Redirect::intended('dashboard');
        } else {
            return back()->withErrors([
                'sorsu_email' => 'The provided credentials is invalid!'
            ])->onlyInput('sorsu_email');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
