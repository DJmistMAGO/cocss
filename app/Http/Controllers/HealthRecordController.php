<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAppointment;
use App\Models\Appointment;
use App\Models\MedicineInventory;
use App\Models\AppointmentMedicine;


class HealthRecordController extends Controller
{
    public function index()
    {
        $app_history = BookAppointment::where('status', 'completed')->where('user_id', auth()->user()->id)->get();

        return view('modules.health-record.index', compact('app_history'));
    }

    public function show(BookAppointment $bookappointment)
    {
        $appointmentMedicine = AppointmentMedicine::where('appointment_id', $bookappointment->appointment->id)->get();

        $medicine = MedicineInventory::all();

        return view('modules.health-record.view', compact('bookappointment', 'appointmentMedicine', 'medicine'));
    }
}
