<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Appointment;
use App\Models\AppointmentMedicine;
use App\Models\BookAppointment;
use App\Models\MedicineInventory;
use Livewire\Component;

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

    public $med_qty;
    public $med_name;
    public $med_time;

    protected $listeners = ['delete'];

    public function mount()
    {
        $this->medicine = MedicineInventory::all();
    }

    protected $rules = [
        'results' => 'required',
        'med_name' => 'required',
        'med_qty' => 'required',
        'med_time' => 'required',
    ];

    public function resetInputFields()
    {
        $this->results = '';
        $this->med_name = '';
        $this->med_qty = '';
        $this->med_time = '';
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
        $this->appointment_date = $book_appointment->appointment_date;
        $this->appointment_time = $book_appointment->appointment_time;
        $this->reason = $book_appointment->reason;
        $this->results = $this->results;

        $this->med_name = $this->med_name; //will save id only of medicine
        $this->med_qty = $this->med_qty;
        $this->med_time = $this->med_time;

    }

    public function checkupSave()
    {
        $validate = $this->validate();

        $medicine = MedicineInventory::find($this->med_name);

        if ($medicine->med_quantity < $this->med_qty) {
            return redirect()->back()->with('error', 'Medicine quantity is not enough');
        }

        $medicine->med_quantity = $medicine->med_quantity - $this->med_qty;
        $medicine->save();

        $book_appointment = BookAppointment::find($this->book_appointment_id);

        $book_appointment->status = 'done';
        $book_appointment->save();

        $appointment = Appointment::create([
            'book_appointment_id' => $this->book_appointment_id,
            'results' => $this->results,
        ]);

        $app_medicine = AppointmentMedicine::create([
            'appointment_id' => $appointment->id,
            'medicine_name' => $this->med_name,
            'med_quantity' => $this->med_qty,
            'med_time' => $this->med_time,
            'medicine_id' => $this->med_name,
        ]);

        $this->emit('closeModal', '#checkup');

        $this->resetInputFields();

        return redirect()->route('appointment.index');
    }
}
