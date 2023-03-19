<?php

namespace App\Http\Livewire\HealthRecord;

use App\Models\BookAppointment;
use App\Models\HealthRecord;
use Livewire\Component;

class IndexShow extends Component
{
    public function render()
    {
        $hrs = BookAppointment::with('appointment', 'appointment.medicine')->where('status', 'done')->where('user_id', auth()->user()->id)->get();
        // dd($hrs);

        return view('livewire.health-record.index-show', compact('hrs'));
    }
}
