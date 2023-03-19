<?php

namespace App\Http\Livewire\Appointment;

use Livewire\Component;
use App\Models\BookAppointment;
use App\Models\MedicineInventory;
use App\Models\AppointmentMedicine;
use App\Models\Appointment;


class IndexShow extends Component
{
    public $appointment_date;
    public $appointment_time;
    public $reason;
    public $status;
    public $appointment_id;

    public $book_appointment_id;

    public $medicine;

    public $results;

    public $medicine_id;
    public $med_quantity;
    public $med_name;

    protected $listeners = ['delete'];

    public function mount()
    {
        $this->medicine = MedicineInventory::all();
    }

    protected $rules = [
        'results' => 'required',

        'medicine_name' => 'required',
        'med_quantity' => 'required',
        'med_time' => 'required',
    ];

    public function resetInputFields()
    {
        $this->results = '';
        $this->appointment_time = '';
        $this->reason = '';
    }

    public function render()
    {
        $book_appointment = BookAppointment::where('status', 'approved')->get();

        return view('livewire.appointment.index-show', compact('book_appointment'));
    }

    public function view($id)
    {
        $book_appointment = BookAppointment::find($id);

        $this->appointment_id = $book_appointment->id;

        $this->emit('showModal', '#view');
    }

    public function checkUp($id)
    {
        $book_appointment = BookAppointment::find($id);

        $this->book_appointment_id = $book_appointment->id;

    }

    public function checkupSave()
    {
        
    }
}
