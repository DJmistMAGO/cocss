<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
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
        $user->assignRole('user');

        // automatic login of user once validated and registered
        if ($user) {
            auth()->attempt($request->only('sorsu_email', 'password'));
            return redirect()->route('dashboard');
        } else {
            // else display an error message
            return back()->with('status', 'Registration failed!');
        }
    }
}
