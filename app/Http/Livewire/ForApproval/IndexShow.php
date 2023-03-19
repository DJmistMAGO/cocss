<?php

namespace App\Http\Livewire\ForApproval;

use Livewire\Component;
use App\Models\BookAppointment;
use App\Models\User;

class IndexShow extends Component
{
    public $appointment_date;
    public $appointment_time;
    public $reason;
    public $status;
    public $appointment_id;

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

    public function render()
    {
        //get all book appointment with pending status
        $book_appointment = BookAppointment::where('status', 'pending')->get();

        return view('livewire.for-approval.index-show', compact('book_appointment'));
    }

    //edit
    public function edit($id)
    {
        $book_appointment = BookAppointment::find($id);

        $this->appointment_id = $book_appointment->id;
        $this->appointment_date = $book_appointment->appointment_date;
        $this->appointment_time = $book_appointment->appointment_time;
        $this->reason = $book_appointment->reason;

        $this->emit('showModal', '#view');
    }

    public function update()
    {
        $validated = $this->validate();
        // dd($validated);

        $book_appointment = BookAppointment::find($this->appointment_id);

        $book_appointment->update([
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'reason' => $validated['reason'],
            'status' => 'approved',
        ]);

        $this->resetInputFields();
        $this->emit('hideModal', '#view');

        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully updated your appointment']);
    }
}
