<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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


    public function registerForm()
    {
        return view('auth.register');
    }

    public function registerStore(RegisterRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);

        $user = User::create([
            'school_id' => $validated['school_id'],
            'name' => $validated['name'],
            'bdate' => $validated['bdate'],
            'phone_no' => $validated['phone_no'],
            'sorsu_email' => $validated['sorsu_email'],
            'password' => Hash::make($validated['password']),
            'user_name' => $validated['name'],
        ]);

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
