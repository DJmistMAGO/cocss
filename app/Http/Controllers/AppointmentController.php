<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAppointment;
use App\Models\MedicineInventory;
use App\Models\AppointmentMedicine;
use App\Models\Appointment;
use App\Http\Requests\MedAppointment\StoreRequest;
use Termwind\Components\Dd;
use App\Models\User;
use Illuminate\Support\Carbon;

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

    public function walkIn()
    {
        $medicine = MedicineInventory::all();

        // get all users with a role of user
        $users = User::role('user')->get();

        return view('modules.appointment.create', compact('medicine', 'users'));
    }

    public function storeWalkIn(Request $request)
    {
        $patient = $request->input('patient');
        $result = $request->input('result');

        $medicine_name = $request->input('medicine_name');
        $med_quantity = $request->input('med_quantity');
        $med_time = $request->input('med_time');

        $date = Carbon::now();
        $time = Carbon::now()->format('h:i:s');

        BookAppointment::create([
            'user_id' => $patient,
            'appointment_date' => $date,
            'appointment_time' => $time,
            'reason' => 'Walk-in',
            'status' => 'completed',
        ]);

        $book_appointment_id = BookAppointment::latest()->first()->id;

        Appointment::create([
            'book_appointment_id' => $book_appointment_id,
            'results' => $result,
        ]);

        $appointment_id = Appointment::latest()->first()->id;

        foreach ($medicine_name as $key => $value) {
            AppointmentMedicine::create([
                'appointment_id' => $appointment_id,
                'medicine_name' => $medicine_name[$key],
                'med_quantity' => $med_quantity[$key],
                'med_time' => $med_time[$key],
            ]);

            //subtract the quantity of medicine in the inventory
            $medicine = MedicineInventory::where('id', $medicine_name[$key])->first(); 
            $medicine->med_quantity = $medicine->med_quantity - $med_quantity[$key];
            $medicine->save();
        }

        return redirect()->route('appointment.index');
    }
}
