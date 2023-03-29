<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAppointment;
use App\Models\Appointment;
use App\Models\MedicineInventory;
use App\Models\AppointmentMedicine;
use Termwind\Components\Dd;

class AppointmentHistoryController extends Controller
{
    public function index(){

        $book_appointment = BookAppointment::where('status', 'completed')->get();

        return view('modules.appointment-history.index', compact('book_appointment'));
    }

    public function show(BookAppointment $bookappointment)
    {
        $appointmentMedicine = AppointmentMedicine::where('appointment_id', $bookappointment->appointment->id)->get();

        $medicine = MedicineInventory::all();

        return view('modules.appointment-history.view', compact('bookappointment' , 'appointmentMedicine', 'medicine'));
    }
}
