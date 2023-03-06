<?php

namespace App\Http\Controllers\Auth;

use App\Models\StudentUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function registerStore(Request $request)
    {
        // $request->validate([
        //     'schoolId' => 'required|string|max:255',
        //     'fullname' => 'required|string|max:255',
        //     'birthdate' => 'required|date',
        //     'phone' => 'required|string|max:255',
        //     'email' => 'required|string|email|unique:student_users|max:255',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        // //create with validation
        // $user = StudentUsers::create([
        //     'schoolId' => $request->schoolId,
        //     'fullname' => $request->fullname,
        //     'birthdate' => $request->birthdate,
        //     'phone' => $request->phone,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

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
