<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAppointment;
use App\Models\MedicineInventory;
use App\Models\AppointmentMedicine;
use App\Models\Appointment;
use App\Http\Requests\MedAppointment\StoreRequest;
use Termwind\Components\Dd;

class AppointmentController extends Controller
{
    public function index()
    {
        $book_appointment = BookAppointment::where('status', 'approved')->get();

        return view('modules.appointment.index', compact('book_appointment'));
    }

    public function edit(BookAppointment $book_appointment)
    {
        $medicine = MedicineInventory::all();

        return view('modules.appointment.checkup', compact('book_appointment', 'medicine'));
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $appointment = Appointment::create([
            'book_appointment_id' => $validated['book_appointment_id'],
            'results' => $validated['result'],
        ]);

        foreach ($validated['medicine_name'] as $key => $value) {
            $appointment->appointmentMedicine()->create([
                'medicine_name' => $validated['medicine_name'][$key],
                'med_quantity' => $validated['med_quantity'][$key],
                'med_time' => $validated['med_time'][$key],
            ]);
        }

        $book_appointment = BookAppointment::find($validated['book_appointment_id']);
        $book_appointment->status = 'completed';
        $book_appointment->save();

        return redirect()->route('appointment.index');
    }
}
