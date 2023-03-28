<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAppointment;

class AppointmentHistoryController extends Controller
{
    public function index(){

        $book_appointment = BookAppointment::where('status', 'completed')->get();

        return view('modules.appointment-history.index', compact('book_appointment'));
    }


}
