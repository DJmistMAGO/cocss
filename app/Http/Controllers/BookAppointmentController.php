<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookAppointmentController extends Controller
{
    public function index()
    {
        return view('modules.book-appointment.index');
    }
}
