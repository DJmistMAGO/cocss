<?php

namespace App\Http\Livewire\AppointmentHistory;

use App\Models\BookAppointment;
use Livewire\Component;
use App\Models\User;

class IndexShow extends Component
{
    public $search;
    // public $name;
    public function render()
    {
        $app_history = BookAppointment::with('appointment')->where('status', 'completed')->orderBy('updated_at', 'desc')->get();

        return view('livewire.appointment-history.index-show', compact('app_history'));
    }

    public function search()
{
    $this->app_history = BookAppointment::whereHas('user', function ($query) {
        $query->where('school_id', 'like', '%' . $this->search . '%')
        ->orWhere('name', 'like', '%' . $this->search . '%');

    })->get();
}

}
