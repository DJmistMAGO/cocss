<?php

namespace App\Http\Livewire\Forecasting;


use Carbon\Carbon;
use Livewire\Component;
use App\Models\MedicineInventory;

class IndexShow extends Component
{

    public function render()
    {
        $medicines = MedicineInventory::where('exp_date', '<=', Carbon::now()->addMonth())->get();

        $data = array();
        $categories = array();

        foreach ($medicines as $medicine) {
            $categories[] = $medicine->med_name;
            $data[] = array(
                'exp_date' => $medicine->exp_date,
                'data' => array((int)$medicine->med_quantity)
            );
        }

        return view('livewire.forecasting.index-show', compact('categories', 'data', 'medicines'));
    }
}
