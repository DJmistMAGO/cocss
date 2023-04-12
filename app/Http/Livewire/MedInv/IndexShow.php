<?php

namespace App\Http\Livewire\MedInv;

use Livewire\Component;
use App\Models\MedicineInventory;
use Termwind\Components\Dd;

class IndexShow extends Component
{
    public $med_name;
    public $exp_date;
    public $med_description;
    public $med_quantity;
    public $medicine_id;
    public $add_stock;

    protected $listeners = ['delete'];

    protected $rules = [
        'med_name' => 'required',
        'exp_date' => 'required',
        'med_description' => 'required',
        'med_quantity' => 'required',
    ];

    public function render()
    {
        $med_inv = MedicineInventory::all();
        return view('livewire.med-inv.index-show', compact('med_inv'));
    }

    public function resetInputFields()
    {
        $this->med_name = '';
        $this->exp_date = '';
        $this->med_description = '';
        $this->med_quantity = '';
    }

    public function store()
    {
        $validated = $this->validate([
            'med_name' => 'required|string|max:255',
            'exp_date' => 'required|date',
            'med_description' => 'required|string|max:255',
            'med_quantity' => 'required|integer',
        ]);

        MedicineInventory::create([
            'med_name' => $validated['med_name'],
            'exp_date' => $validated['exp_date'],
            'med_description' => $validated['med_description'],
            'med_quantity' => $validated['med_quantity'],
        ]);

        $this->resetInputFields();
        $this->emit('hideModal', '#create');

        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully created your appointment']);
    }

    public function edit($id)
    {
        $med_inv = MedicineInventory::find($id);
        // dd( $med_inv->exp_date);

        $this->medicine_id = $med_inv->id;
        $this->med_name = $med_inv->med_name;
        $this->exp_date = $med_inv->exp_date->format('Y-m-d');
        $this->med_description = $med_inv->med_description;
        $this->med_quantity = $med_inv->med_quantity;
    }

    public function update()
    {
        $validated = $this->validate([
            'med_name' => 'required|string|max:255',
            'exp_date' => 'required|date',
            'med_description' => 'required|string|max:255',
            'med_quantity' => 'required|integer',
        ]);

        $med_inv = MedicineInventory::find($this->medicine_id);

        $med_inv->update([
            'med_name' => $validated['med_name'],
            'exp_date' => $validated['exp_date'],
            'med_description' => $validated['med_description'],
            'med_quantity' => $validated['med_quantity'],
        ]);

        $this->resetInputFields();
        $this->emit('hideModal', '#edit');

        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully updated your appointment']);
    }

    public function view($id)
    {
        $med_inv = MedicineInventory::find($id);
        
        $this->medicine_id = $med_inv->id;
        $this->med_name = $med_inv->med_name;
        $this->exp_date = $med_inv->exp_date->format('Y-m-d');
        $this->med_description = $med_inv->med_description;
        $this->med_quantity = $med_inv->med_quantity;
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $id,
            'message' => 'Are you sure?'
        ]);
    }

    public function delete($id)
    {
        $med = MedicineInventory::where('id', $id)->first();
        if ($med != null) {
            $med->delete();
        }
    }

    public function addStock($id)
    {
        $this->medicine_id = $id;
    }

    //generate a code to add a stock of medicine and update the quantity
    public function restock()
    {
        $this->validate([
            'add_stock' => 'required|integer|min:1',
        ]);

        $medicine = MedicineInventory::find( $this->medicine_id);

        $medicine->med_quantity += $this->add_stock;

        $medicine->save();

        $this->add_stock = '';

        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'Medicine restocked successfully.']);
    }
}
