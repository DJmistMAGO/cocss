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

        //get time today
        $time = Carbon::now()->format('H:i:s');

        //count book appointment status is approval
        $countApprove = BookAppointment::where('user_id', $app_id)->where('appointment_date', '>=', $today)->where('status', 'approved')->count();

        //get only data that is greater than or equal to today
        $appointment = BookAppointment::where('user_id', $app_id)->where('appointment_date', '>=', $today)->where('status', 'approved')->get();

        return view('livewire.user-notification.user-notification', compact( 'appointment',  'countApprove', 'today', 'time'));
    }
}
