<?php

namespace App\Http\Livewire\Forecasting;


use Carbon\Carbon;

use Livewire\Component;

use App\Models\MedicineInventory;
use Phpml\Regression\LeastSquares;

class IndexShow extends Component
{

    //
    // // will get the forecasted order quantity of the medicine on the next month using rule-based method (simple moving average)
    // public function orderPrediction()
    // {
    //     $orderQuantities = [];

    //     // order by descending order of medicine name and expiration date
    //     $inventory = MedicineInventory::orderBy('med_name', 'desc')
    //         ->orderBy('exp_date', 'desc')
    //         ->get();

    //     // Calculate total predicted quantity of each medicine for the next month
    //     foreach ($inventory as $medicine) {
    //         $expirationDate = Carbon::parse($medicine->exp_date); // will get the expiration date of the medicine
    //         $oneMonthFromNow = Carbon::now()->addMonth();  // will get the date of the next month

    //         if ($expirationDate < $oneMonthFromNow) {
    //             $daysUntilExpiration = $expirationDate->diffInDays($oneMonthFromNow); // will get the difference of the expiration date and the date of the next month
    //             $predictedQuantity = $medicine->med_quantity - ($daysUntilExpiration * $medicine->med_quantity / 30); // will get the predicted quantity of the medicine on the next month

    //             // Initialize order quantity to 0 if it doesn't exist
    //             if (!isset($orderQuantities[$medicine->med_name])) {
    //                 $orderQuantities[$medicine->med_name] = 0;
    //             }

    //             // Add predicted quantity to order quantity
    //             $orderQuantities[$medicine->med_name] += max($predictedQuantity, 0);
    //         }
    //     }

    //     // Calculate order quantities based on minimum order quantity and current stock level
    //     $orders = [];

    //     // will get the minimum order quantity and the current stock level of the medicine
    //     foreach ($orderQuantities as $name => $quantity) {
    //         $medicine = MedicineInventory::where('med_name', $name)->first();

    //         if ($medicine) {
    //             $minOrderQuantity = 100;  // will get the minimum order quantity of the medicine
    //             $currentStockLevel = $medicine->med_quantity;  // will get the current stock level of the medicine

    //             $orderQuantity = max(intval($minOrderQuantity - $currentStockLevel + $quantity), 0);  // will get the order quantity of the medicine
    //             $orders[] = [
    //                 'name' => $name,
    //                 'quantity' => $orderQuantity,
    //             ];
    //         }
    //     }

    //     return $orders; // will return the order quantity of the medicine
    // }
    //

    public function forecasting()
    {
        $samples = [
            ['Biogesic', 40, '2020-1-1'],
            ['Poten-C', 60, '2020-1-1'],
            ['Neozep', 16, '2020-1-1'],
            ['Neozep', 18, '2020-2-1'],
            ['Biogesic', 12, '2020-2-1'],
            ['Ascorbic Acid', 20, '2020-2-1'],
            ['Poten-C', 20, '2020-3-1'],
            ['Biogesic', 18, '2020-3-1'],
            ['Alaxan', 12, '2020-3-1'],
            ['Neozep', 10, '2020-3-1'],
            ['Ceterizin', 12, '2020-4-1'],
            ['Immune pro', 32, '2020-4-1'],
            ['Biogesic', 20, '2020-4-1'],
            ['Alaxan', 20, '2020-5-1'],
            ['Neozep', 40, '2020-5-1'],
            ['Biogesic', 20, '2020-6-1'],
            ['Ascorbic Acid', 40, '2020-6-1'],
            ['Biogesic', 10, '2020-7-1'],
            ['Amoxicillin', 12, '2020-7-1'],
            ['Ascorbic Acid', 30, '2020-7-1'],
            ['Alaxan', 12, '2020-8-1'],
            ['Bioflu', 10, '2020-8-1'],
            ['Solmux', 24, '2020-9-1'],
            ['Immune pro', 32, '2020-9-1'],
            ['Biogesic', 32, '2020-10-1'],
            ['Bioflu', 20, '2020-10-01'],
            ['Immune pro', 24, '2020-11-01'],
            ['Ascorbic Acid', 30, '2020-11-01'],
            ['Neozep', 32, '2020-11-01'],
            ['Biogesic', 40, '2020-12-01'],
            ['Poten-C', 60, '2020-12-01'],
            ['Alaxan', 34, '2020-12-01'],
            ['Biogesic', 10, '2021-01-01'],
            ['Neozep', 5, '2021-01-01'],
            ['Alaxan', 10, '2021-01-01'],
            ['Ascorbic Acid', 10, '2021-01-01'],
            ['Neozep', 4, '2021-02-01'],
            ['Stress Tabs', 20, '2021-02-01'],
            ['Ascorbic Acid', 10, '2021-02-01'],
            ['Biogesic', 10, '2021-03-01'],
            ['Ascorbic Acid', 20, '2021-04-01'],
            ['Neozep', 8, '2021-05-01'],
            ['Biogesic', 10, '2021-05-01'],
            ['Alaxan', 10, '2021-05-01'],
            ['Stress Tabs', 10, '2021-06-01'],
            ['Biogesic', 10, '2021-07-01'],
            ['Stress Tabs', 10, '2021-07-01'],
            ['Alaxan', 10, '2021-08-01'],
            ['Stress Tabs', 20, '2021-08-01'],
            ['Ascorbic Acid', 10, '2021-08-01'],
            ['Bioflu', 10, '2021-09-01'],
            ['Biogesic', 10, '2021-09-01'],
            ['Neozep', 20, '2021-09-01'],
            ['Bioflu', 10, '2021-10-01'],
            ['Neozep', 10, '2021-10-01'],
            ['Biogesic', 10, '2021-11-01'],
            ['Neozep', 5, '2021-11-01'],
            ['Ascorbic Acid', 30, '2021-11-01'],
            ['Ascorbic Acid', 20, '2021-12-01'],
            ['Biogesic', 10, '2021-12-01'],
            ['Neozep', 10, '2021-12-01'],
            ['Biogesic', 205, '2022-01-01'],
            ['Neozep', 82, '2022-01-01'],
            ['Solmux', 20, '2022-01-01'],
            ['Alaxan', 96, '2022-01-01'],
            ['Ascorbic Acid', 20, '2022-01-01'],
            ['Neozep', 10, '2022-02-01'],
            ['Alaxan', 10, '2022-02-01'],
            ['Stress Tabs', 20, '2022-02-01'],
            ['Neurogen-E', 20, '2022-02-01'],
            ['Amoxicillin', 10, '2022-02-01'],
            ['Solmux', 12, '2022-03-01'],
            ['Biogesic', 10, '2022-03-01'],
            ['Alaxan', 4, '2022-04-01'],
            ['Solmux', 12, '2022-04-01'],
            ['Ascorbic Acid', 24, '2022-05-01'],
            ['Biogesic', 13, '2022-05-01'],
            ['Solmux', 15, '2022-05-01'],
            ['Alaxan', 20, '2022-05-01'],
            ['Stress Tabs', 40, '2022-05-01'],
            ['Neurogen-E', 10, '2022-05-01'],
            ['Stress Tabs', 10, '2022-06-01'],
            ['Cataflam', 96, '2022-06-01'],
            ['Amoxicillin', 21, '2022-06-01'],
            ['Solmux', 12, '2022-06-01'],
            ['Stress Tabs', 20, '2022-07-01'],
            ['Alaxan', 20, '2022-07-01'],
            ['Ceterizin', 15, '2022-07-01'],
            ['Biogesic', 40, '2022-07-01'],
            ['Stress Tabs', 40, '2022-08-01'],
            ['Immune pro', 490, '2022-08-01'],
            ['Biogesic', 15, '2022-08-01'],
            ['Alaxan', 10, '2022-08-01'],
            ['Neozep', 70, '2022-08-01'],
            ['Ascorbic Acid', 20, '2022-08-01'],
            ['Amoxicillin', 10, '2022-08-01'],
            ['Stress Tabs', 10, '2022-09-01'],
            ['Neozep', 20, '2022-09-01'],
            ['Biogesic', 20, '2022-09-01'],
            ['Alaxan', 20, '2022-09-01'],
            ['Ascorbic Acid', 50, '2022-09-01'],
            ['Bioflu', 20, '2022-09-01'],
            ['Biogesic', 20, '2022-10-01'],
            ['Bioflu', 40, '2022-10-01'],
            ['Neozep', 10, '2022-10-01'],
            ['Neozep', 10, '2022-11-01'],
            ['Ascorbic Acid', 340, '2022-11-01'],
            ['Neurogen-E', 40, '2022-11-01'],
            ['Biogesic', 30, '2022-11-01'],
            ['Alaxan', 30, '2022-11-01'],
            ['Bioflu', 40, '2022-11-01'],
            ['Mefenamic', 20, '2022-11-01'],
            ['Ascorbic Acid', 110, '2022-12-01'],
            ['Biogesic', 60, '2022-12-01'],
            ['Solmux', 10, '2022-12-01'],
            ['Neozep', 40, '2022-12-01'],
            ['Alaxan', 30, '2022-12-01'],
            ['Ceterizin', 30, '2022-12-01'],
            ['Mefenamic', 30, '2022-12-01']
        ];

        // separate training set and 
    }



    public function render()
    {

        $medicines = MedicineInventory::where('exp_date', '<=', Carbon::now()->addMonth())->get();

        $data = array();

        foreach ($medicines as $medicine) {
            $data[] = array(
                'name' => $medicine->med_name,
                'data' => array(
                    array(
                        'x' => $medicine->exp_date,
                        'y' => (int)$medicine->med_quantity
                    )
                )
            );
        }

        $categories = array();
        foreach ($data as $series) {
            foreach ($series['data'] as $datapoint) {
                $categories[] = $datapoint['x'];
            }
        }
        $categories = array_unique($categories);
        sort($categories);


        $chartData = $this->forecasting();
        dd($chartData);



        $orders = [];

        return view('livewire.forecasting.index-show', compact('orders', 'data', 'categories', 'medicines'));
    }
}
