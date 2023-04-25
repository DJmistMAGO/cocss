<?php

namespace App\Http\Livewire\Forecasting;


use Carbon\Carbon;

use Livewire\Component;

use App\Models\MedicineInventory;


class IndexShow extends Component
{

    // will get the forecasted order quantity of the medicine on the next month using rule-based method (simple moving average)
    public function orderPrediction()
    {
        $orderQuantities = [];

        // order by descending order of medicine name and expiration date
        $inventory = MedicineInventory::orderBy('med_name', 'desc')
            ->orderBy('exp_date', 'desc')
            ->get();

        // Calculate total predicted quantity of each medicine for the next month
        foreach ($inventory as $medicine) {
            $expirationDate = Carbon::parse($medicine->exp_date); // will get the expiration date of the medicine
            $oneMonthFromNow = Carbon::now()->addMonth();  // will get the date of the next month

            if ($expirationDate < $oneMonthFromNow) {
                $daysUntilExpiration = $expirationDate->diffInDays($oneMonthFromNow); // will get the difference of the expiration date and the date of the next month
                $predictedQuantity = $medicine->med_quantity - ($daysUntilExpiration * $medicine->med_quantity / 30); // will get the predicted quantity of the medicine on the next month

                // Initialize order quantity to 0 if it doesn't exist
                if (!isset($orderQuantities[$medicine->med_name])) {
                    $orderQuantities[$medicine->med_name] = 0;
                }

                // Add predicted quantity to order quantity
                $orderQuantities[$medicine->med_name] += max($predictedQuantity, 0);
            }
        }

        // Calculate order quantities based on minimum order quantity and current stock level
        $orders = [];

        // will get the minimum order quantity and the current stock level of the medicine
        foreach ($orderQuantities as $name => $quantity) {
            $medicine = MedicineInventory::where('med_name', $name)->first();

            if ($medicine) {
                $minOrderQuantity = 100;  // will get the minimum order quantity of the medicine
                $currentStockLevel = $medicine->med_quantity;  // will get the current stock level of the medicine

                $orderQuantity = max(intval($minOrderQuantity - $currentStockLevel + $quantity), 0);  // will get the order quantity of the medicine
                $orders[] = [
                    'name' => $name,
                    'quantity' => $orderQuantity,
                ];
            }
        }

        return $orders; // will return the order quantity of the medicine
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

        // will get the order quantity of the medicine
        $orders = $this->orderPrediction();  // will get the value from the forecasting() method

        return view('livewire.forecasting.index-show', compact('categories', 'data', 'medicines', 'orders'));
    }
}
