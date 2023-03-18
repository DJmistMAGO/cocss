<?php

namespace App\Http\Livewire\BookAppointment;

use Livewire\Component;
use App\Models\BookAppointment;
use Termwind\Components\Dd;

class IndexShow extends Component
{
    public $appointment_date;
    public $appointment_time;
    public $reason;

    protected $listeners = ['delete'];

    protected $rules = [
        'appointment_date' => 'required',
        'appointment_time' => 'required',
        'reason' => 'required',
    ];


    public function resetInputFields()
    {
        $this->appointment_date = '';
        $this->appointment_time = '';
        $this->reason = '';
    }

    public function store()
    {
        $validated = $this->validated();
        dd($validated);

        BookAppointment::create([
            'user_id' => auth()->user()->id,
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'reason' => $validated['reason'],
        ]);

        $this->resetInputFields();
        $this->emit('hideModal', '#create');

        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully created RCRD']);
    }


    public function render()
    {
        $book_appointments = BookAppointment::where('user_id', auth()->user()->id)->get();

        return view('livewire.book-appointment.index-show', compact('book_appointments'));
    }
}
