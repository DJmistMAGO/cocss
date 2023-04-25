<?php

namespace App\Http\Livewire\Forecasting;


use Carbon\Carbon;

use Livewire\Component;

use App\Models\MedicineInventory;


class IndexShow extends Component
{

    // will get the forecasted quantity of the medicine on the next month using rule-based method (simple moving average)
    // public function forecasting()
    // {
    //     $quantities = [];

    //     $inventory = MedicineInventory::orderBy('med_name', 'asc')
    //         ->orderBy('exp_date', 'asc')
    //         ->get();

    //     foreach ($inventory as $medicine) {
    //         $expirationDate = Carbon::parse($medicine->exp_date); // will get the expiration date of the medicine
    //         $oneMonthFromNow = Carbon::now()->addMonth();         // will get the date of the next month

    //         if ($expirationDate > $oneMonthFromNow) {             // will check if the expiration date is greater than the date of the next month
    //             $daysUntilExpiration = $expirationDate->diffInDays($oneMonthFromNow);  // will get the difference in days between the expiration date and the date of the next month
    //             $predictedQuantity = $medicine->med_quantity - ($daysUntilExpiration * $medicine->med_quantity / 30);  // will get the predicted quantity of the medicine on the next month
    //             $quantities[] = [
    //                 'name' => $medicine->med_name,
    //                 'quantity' => max($predictedQuantity, 0),
    //                 'expiration_date' => $expirationDate->format('Y-m-d'),
    //             ];
    //         }
    //     }

    //     return $quantities;  // will return the predicted quantity of the medicine on the next month
    // }


    // will get the forecasted order quantity of the medicine on the next month using rule-based method (simple moving average)
    public function orderPrediction()
    {
        $orderQuantities = [];

        $inventory = MedicineInventory::orderBy('med_name', 'asc')
            ->orderBy('exp_date', 'asc')
            ->get();

        // Calculate total predicted quantity of each medicine for the next month
        foreach ($inventory as $medicine) {
            $expirationDate = Carbon::parse($medicine->exp_date); // will get the expiration date of the medicine
            $oneMonthFromNow = Carbon::now()->addMonth();  // will get the date of the next month

            if ($expirationDate < $oneMonthFromNow) {
                $daysUntilExpiration = $expirationDate->diffInDays($oneMonthFromNow);
                $predictedQuantity = $medicine->med_quantity - ($daysUntilExpiration * $medicine->med_quantity / 30);

                if (!isset($orderQuantities[$medicine->med_name])) {
                    $orderQuantities[$medicine->med_name] = 0;
                }

                $orderQuantities[$medicine->med_name] += max($predictedQuantity, 0);
            }
        }

        // Calculate order quantities based on minimum order quantity and current stock level
        $orders = [];
        foreach ($orderQuantities as $name => $quantity) {
            $medicine = MedicineInventory::where('med_name', $name)->first();

            if ($medicine) {
                $minOrderQuantity = 500; // TODO: Get minimum order quantity from database
                $currentStockLevel = $medicine->med_quantity; // TODO: Get current stock level from database

                $orderQuantity = max(intval($minOrderQuantity - $currentStockLevel + $quantity), 0);
                $orders[] = [
                    'name' => $name,
                    'quantity' => $orderQuantity,
                ];
            }
        }

        return $orders;
    }

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

        $orders = $this->orderPrediction();  // will get the value from the forecasting() method

        return view('livewire.forecasting.index-show', compact('categories', 'data', 'medicines', 'orders'));
    }
}
