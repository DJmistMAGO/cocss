<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use App\Models\BookAppointment;
use App\Models\Appointment;
use Illuminate\Support\Carbon;
use Termwind\Components\Dd;

class Notification extends Component
{
    public function render()
    {
        //get date today
        $today = Carbon::today()->format('Y-m-d');

        //count book appointment status is approval
        $countBook = BookAppointment::where('status', 'pending')->count();
        $countApprove = BookAppointment::where('status', 'approved')->where('appointment_date', $today)->count();


        //get appointment status is approval
        $bookApp = BookAppointment::where('status', 'pending')->get();
        $appointment = BookAppointment::where('status', 'approved')->where('appointment_date', $today)->get();

        // dd($appointment);

        $addCount = $countBook + $countApprove;

        return view('livewire.notification.notification', compact('addCount', 'bookApp', 'appointment', 'countBook', 'countApprove'));
    }
}
