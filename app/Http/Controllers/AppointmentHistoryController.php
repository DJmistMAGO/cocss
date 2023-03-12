<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentHistoryController extends Controller
{
    public function index(){

        return view('modules.appointment-history.index');
    }
}
