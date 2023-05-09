<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('modules.users.index');
    }

    public function view(User $user)
    {
        return view('modules.users.view', compact('user'));
    }

}
