<?php

namespace App\Http\Livewire\UserNotification;

use Livewire\Component;
use App\Models\BookAppointment;
use Illuminate\Support\Carbon;

class UserNotification extends Component
{
    public function render()
    {
        //app id
        $app_id = auth()->user()->id;

        //get date today
        $today = Carbon::today()->format('Y-m-d');

        //count book appointment status is approval
        $countApprove = BookAppointment::where('user_id', $app_id)->where('status', 'approved')->where('appointment_date', $today)->count();


        //get appointment status is approval
        $appointment = BookAppointment::where('user_id', $app_id)->where('status', 'approved')->where('appointment_date', $today)->get();

        // dd($appointment);



        return view('livewire.user-notification.user-notification', compact( 'appointment',  'countApprove'));
    }
}
