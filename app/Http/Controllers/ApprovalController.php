<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index()
    {
        return view('modules.approval.index');
    }
}
