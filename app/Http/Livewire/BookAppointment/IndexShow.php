<?php

namespace App\Http\Livewire\BookAppointment;

use Livewire\Component;
use App\Models\BookAppointment;

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

    public function store()
    {
        $validated = $this->validate([
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'reason' => 'required|string|max:255',
        ]);

        BookAppointment::create([
            'user_id' => auth()->user()->id,
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'reason' => $validated['reason'],
        ]);


        $this->resetInputFields();
        $this->emit('hideModal', '#create');

        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully created your appointment']);
    }

    //edit
    public function edit($id)
    {
        $book_appointment = BookAppointment::find($id);

        $this->appointment_id = $book_appointment->id;
        $this->appointment_date = $book_appointment->appointment_date->format('Y-m-d');
        $this->appointment_time = $book_appointment->appointment_time;
        $this->reason = $book_appointment->reason;

        $this->emit('showModal', '#edit');
    }

    //update
    public function update()
    {
        $validated = $this->validate();
        // dd($validated);

        $book_appointment = BookAppointment::find($this->appointment_id);

        $book_appointment->update([
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'reason' => $validated['reason'],
        ]);

        $this->resetInputFields();
        $this->emit('hideModal', '#edit');

        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully updated your appointment']);
    }

    //view
    public function view($id)
    {
        $book_appointment = BookAppointment::find($id);

        $this->appointment_date = $book_appointment->appointment_date->format('Y-m-d');
        $this->appointment_time = $book_appointment->appointment_time;
        $this->reason = $book_appointment->reason;
        $this->status = $book_appointment->status;

        $this->emit('showModal', '#view');
    }

    //delete
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $id,
            'message' => 'Are you sure?'
        ]);
    }

    public function delete($id)
    {
        $rcrd = BookAppointment::where('id', $id)->first();
        if ($rcrd != null) {
            $rcrd->delete();
        }
    }



    public function render()
    {
        $book_appointments = BookAppointment::where('status', ['approved', 'pending'])->where('user_id', auth()->user()->id)->get();

        return view('livewire.book-appointment.index-show', compact('book_appointments'));
    }
}
