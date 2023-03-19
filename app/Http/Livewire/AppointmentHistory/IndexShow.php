<?php

namespace App\Http\Livewire\AppointmentHistory;

use App\Models\BookAppointment;
use Livewire\Component;

class IndexShow extends Component
{
    public function render()
    {
        $app_history = BookAppointment::with('appointment')->where('status', 'done')->orderBy('updated_at', 'desc')->get();
        // dd($app_history);

        return view('livewire.appointment-history.index-show', compact('app_history'));
    }
}
