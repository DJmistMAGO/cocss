<?php

namespace App\Http\Livewire\BookAppointment;

use Livewire\Component;
use App\Models\BookAppointment;

class IndexShow extends Component
{
    public $appointment_date;
    public $appointment_time;
    public $reason;

    public function render()
    {
        $book_appointments = BookAppointment::where('user_id', auth()->user()->id)->get();
        return view('livewire.book-appointment.index-show', compact('book_appointments'));
    }
}
