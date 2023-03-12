<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineInvController extends Controller
{
    public function index() {
        return view('modules.medicine-inv.index');
    }
}
