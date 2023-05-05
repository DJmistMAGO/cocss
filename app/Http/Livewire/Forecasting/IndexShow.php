<?php

namespace App\Http\Livewire\Forecasting;

use App\Models\MedicineInventory;
use Carbon\Carbon;
use Livewire\Component;

class IndexShow extends Component
{

    // public  $historicalData = [
    //     ['Biogesic', 40, '2020-1-1'], //
    //     ['Poten-C', 60, '2020-1-1'], //
    //     ['Neozep', 16, '2020-1-1'], //
    //     ['Neozep', 18, '2020-2-1'], //
    //     ['Biogesic', 12, '2020-2-1'], //
    //     ['Ascorbic Acid', 20, '2020-2-1'], //
    //     ['Poten-C', 20, '2020-3-1'], //
    //     ['Biogesic', 18, '2020-3-1'], //
    //     ['Alaxan', 12, '2020-3-1'], //
    //     ['Neozep', 10, '2020-3-1'], //
    //     ['Ceterizin', 12, '2020-4-1'], //
    //     ['Immune pro', 32, '2020-4-1'], //
    //     ['Biogesic', 20, '2020-4-1'], //
    //     ['Alaxan', 20, '2020-5-1'], //
    //     ['Neozep', 40, '2020-5-1'], //
    //     ['Biogesic', 20, '2020-6-1'], //
    //     ['Ascorbic Acid', 40, '2020-6-1'], //
    //     ['Biogesic', 10, '2020-7-1'], //
    //     ['Amoxicillin', 12, '2020-7-1'], //
    //     ['Ascorbic Acid', 30, '2020-7-1'], //
    //     ['Alaxan', 12, '2020-8-1'], //
    //     ['Bioflu', 10, '2020-8-1'], //
    //     ['Solmux', 24, '2020-9-1'], //
    //     ['Immune pro', 32, '2020-9-1'], //
    //     ['Biogesic', 32, '2020-10-1'], //
    //     ['Bioflu', 20, '2020-10-01'], //
    //     ['Immune pro', 24, '2020-11-01'], //
    //     ['Ascorbic Acid', 30, '2020-11-01'], //
    //     ['Neozep', 32, '2020-11-01'], //
    //     ['Biogesic', 40, '2020-12-01'],
    //     ['Poten-C', 60, '2020-12-01'],
    //     ['Alaxan', 34, '2020-12-01'],
    //     ['Biogesic', 10, '2021-01-01'],
    //     ['Neozep', 5, '2021-01-01'],
    //     ['Alaxan', 10, '2021-01-01'],
    //     ['Ascorbic Acid', 10, '2021-01-01'],
    //     ['Neozep', 4, '2021-02-01'],
    //     ['Stress Tabs', 20, '2021-02-01'],
    //     ['Ascorbic Acid', 10, '2021-02-01'],
    //     ['Biogesic', 10, '2021-03-01'],
    //     ['Ascorbic Acid', 20, '2021-04-01'],
    //     ['Neozep', 8, '2021-05-01'],
    //     ['Biogesic', 10, '2021-05-01'],
    //     ['Alaxan', 10, '2021-05-01'],
    //     ['Stress Tabs', 10, '2021-06-01'],
    //     ['Biogesic', 10, '2021-07-01'],
    //     ['Stress Tabs', 10, '2021-07-01'],
    //     ['Alaxan', 10, '2021-08-01'],
    //     ['Stress Tabs', 20, '2021-08-01'],
    //     ['Ascorbic Acid', 10, '2021-08-01'],
    //     ['Bioflu', 10, '2021-09-01'],
    //     ['Biogesic', 10, '2021-09-01'],
    //     ['Neozep', 20, '2021-09-01'],
    //     ['Bioflu', 10, '2021-10-01'],
    //     ['Neozep', 10, '2021-10-01'],
    //     ['Biogesic', 10, '2021-11-01'],
    //     ['Neozep', 5, '2021-11-01'],
    //     ['Ascorbic Acid', 30, '2021-11-01'],
    //     ['Ascorbic Acid', 20, '2021-12-01'],
    //     ['Biogesic', 10, '2021-12-01'],
    //     ['Neozep', 10, '2021-12-01'],
    //     ['Biogesic', 205, '2022-01-01'],
    //     ['Neozep', 82, '2022-01-01'],
    //     ['Solmux', 20, '2022-01-01'],
    //     ['Alaxan', 96, '2022-01-01'],
    //     ['Ascorbic Acid', 20, '2022-01-01'],
    //     ['Neozep', 10, '2022-02-01'],
    //     ['Alaxan', 10, '2022-02-01'],
    //     ['Stress Tabs', 20, '2022-02-01'],
    //     ['Neurogen-E', 20, '2022-02-01'],
    //     ['Amoxicillin', 10, '2022-02-01'],
    //     ['Solmux', 12, '2022-03-01'],
    //     ['Biogesic', 10, '2022-03-01'],
    //     ['Alaxan', 4, '2022-04-01'],
    //     ['Solmux', 12, '2022-04-01'],
    //     ['Ascorbic Acid', 24, '2022-05-01'],
    //     ['Biogesic', 13, '2022-05-01'],
    //     ['Solmux', 15, '2022-05-01'],
    //     ['Alaxan', 20, '2022-05-01'],
    //     ['Stress Tabs', 40, '2022-05-01'],
    //     ['Neurogen-E', 10, '2022-05-01'],
    //     ['Stress Tabs', 10, '2022-06-01'],
    //     ['Cataflam', 96, '2022-06-01'],
    //     ['Amoxicillin', 21, '2022-06-01'],
    //     ['Solmux', 12, '2022-06-01'],
    //     ['Stress Tabs', 20, '2022-07-01'],
    //     ['Alaxan', 20, '2022-07-01'],
    //     ['Ceterizin', 15, '2022-07-01'],
    //     ['Biogesic', 40, '2022-07-01'],
    //     ['Stress Tabs', 40, '2022-08-01'],
    //     ['Immune pro', 490, '2022-08-01'],
    //     ['Biogesic', 15, '2022-08-01'],
    //     ['Alaxan', 10, '2022-08-01'],
    //     ['Neozep', 70, '2022-08-01'],
    //     ['Ascorbic Acid', 20, '2022-08-01'],
    //     ['Amoxicillin', 10, '2022-08-01'],
    //     ['Stress Tabs', 10, '2022-09-01'],
    //     ['Neozep', 20, '2022-09-01'],
    //     ['Biogesic', 20, '2022-09-01'],
    //     ['Alaxan', 20, '2022-09-01'],
    //     ['Ascorbic Acid', 50, '2022-09-01'],
    //     ['Bioflu', 20, '2022-09-01'],
    //     ['Biogesic', 20, '2022-10-01'],
    //     ['Bioflu', 40, '2022-10-01'],
    //     ['Neozep', 10, '2022-10-01'],
    //     ['Neozep', 10, '2022-11-01'],
    //     ['Ascorbic Acid', 340, '2022-11-01'],
    //     ['Neurogen-E', 40, '2022-11-01'],
    //     ['Biogesic', 30, '2022-11-01'],
    //     ['Alaxan', 30, '2022-11-01'],
    //     ['Bioflu', 40, '2022-11-01'],
    //     ['Mefenamic', 20, '2022-11-01'],
    //     ['Ascorbic Acid', 110, '2022-12-01'],
    //     ['Biogesic', 60, '2022-12-01'],
    //     ['Solmux', 10, '2022-12-01'],
    //     ['Neozep', 40, '2022-12-01'],
    //     ['Alaxan', 30, '2022-12-01'],
    //     ['Ceterizin', 30, '2022-12-01'],
    //     ['Mefenamic', 30, '2022-12-01']
    // ];

    public $dataset = [
        '2020-01-01' => ['Biogesic' => 40, 'Poten-C' => 60, 'Neozep' => 16],
        '2020-02-01' => ['Neozep' => 18, 'Biogesic' => 12, 'Ascorbic Acid' => 20],
        '2020-03-01' => ['Poten-C' => 20, 'Biogesic' => 18, 'Alaxan' => 12, 'Neozep' => 10],
        '2020-04-01' => ['Ceterizin' => 12, 'Immuno Pro' => 32, 'Biogesic' => 20],
        '2020-05-01' => ['Alaxan' => 20, 'Neozep' => 40],
        '2020-06-01' => ['Biogesic' => 20, 'Ascorbic Acid' => 40],
        '2020-07-01' => ['Biogesic' => 10, 'Amoxicillin' => 12, 'Ascorbic Acid' => 30],
        '2020-08-01' => ['Alaxan' => 12, 'Bioflu' => 10],
        '2020-09-01' => ['Solmux' => 24, 'Immuno Pro' => 32],
        '2020-10-01' => ['Biogesic' => 32, 'Bioflu' => 20],
        '2020-11-01' => ['Immuno Pro' => 24, 'Ascorbic Acid' => 30, 'Neozep' => 32],
        '2020-12-01' => ['Biogesic' => 40, 'Poten-C' => 60, 'Alaxan' => 34],
        '2021-01-01' => ['Biogesic' => 10, 'Neozep' => 5, 'Alaxan' => 10, 'Ascorbic Acid' => 10],
        '2021-02-01' => ['Neozep' => 4, 'Stress Tabs' => 20, 'Ascorbic Acid' => 10],
        '2021-03-01' => ['Biogesic' => 10],
        '2021-04-01' => ['Ascorbic Acid' => 20],
        '2021-05-01' => ['Neozep' => 8, 'Biogesic' => 10, 'Alaxan' => 10],
        '2021-06-01' => ['Stress Tabs' => 10],
        '2021-07-01' => ['Biogesic' => 10, 'Stress Tabs' => 10],
        '2021-08-01' => ['Alaxan' => 10, 'Stress Tabs' => 20, 'Ascorbic Acid' => 10],
        '2021-09-01' => ['Bioflu' => 10, 'Biogesic' => 10, 'Neozep' => 20],
        '2021-10-01' => ['Bioflu' => 10, 'Neozep' => 10],
        '2021-11-01' => ['Biogesic' => 10, 'Neozep' => 5, 'Ascorbic Acid' => 30],
        '2021-12-01' => ['Ascorbic Acid' => 20, 'Biogesic' => 10, 'Neozep' => 10],
        '2022-01-01' => ['Biogesic' => 205, 'Neozep' => 82, 'Solmux' => 20, 'Alaxan' => 96, 'Ascorbic Acid' => 20],
        '2022-02-01' => ['Neozep' => 10, 'Alaxan' => 10, 'Stress Tabs' => 20, 'Neurogen-E' => 20, 'Amoxicillin' => 10],
        '2022-03-01' => ['Solmux' => 12, 'Biogesic' => 10],
        '2022-04-01' => ['Alaxan' => 4, 'Solmux' => 12],
        '2022-05-01' => ['Ascorbic Acid' => 24, 'Biogesic' => 13, 'Solmux' => 15, 'Alaxan' => 20, 'Stress Tabs' => 40, 'Neurogen-E' => 10],
        '2022-06-01' => ['Stress Tabs' => 10, 'Cataflam' => 96, 'Amoxicillin' => 21, 'Solmux' => 12],
        '2022-07-01' => ['Stress Tabs' => 20, 'Alaxan' => 20, 'Ceterizin' => 15, 'Biogesic' => 40],
        '2022-08-01' => ['Stress Tabs' => 40, 'Immuno Pro' => 49, 'Biogesic' => 15, 'Alaxan' => 10, 'Neozep' => 70, 'Ascorbic Acid' => 20, 'Amoxicillin' => 10],
        '2022-09-01' => ['Stress Tabs' => 10, 'Neozep' => 20, 'Biogesic' => 20, 'Alaxan' => 20, 'Ascorbic Acid' => 50, 'Bioflu' => 20],
        '2022-10-01' => ['Biogesic' => 20, 'Bioflu' => 40, 'Neozep' => 10],
        '2022-11-01' => ['Neozep' => 10, 'Ascorbic Acid' => 34, 'Neurogen-E' => 40, 'Biogesic' => 30, 'Alaxan' => 30, 'Bioflu' => 40, 'Mefenamic' => 20],
        '2022-12-01' => ['Ascorbic Acid' => 110, 'Biogesic' => 60, 'Solmux' => 10, 'Neozep' => 40, 'Alaxan' => 30, 'Ceterizin' => 30, 'Mefenamic' => 30],
    ];

    public function forecast()
    {
        $data = [];
        $handle = fopen(storage_path('app/medInv.csv'), 'r');
        while (($row = fgetcsv($handle)) !== false) {
            $data[] = [
                'medicine_name' => $row[0],
                'quantity' => (int) $row[1],
                'purchase_date' => $row[2],
            ];
        }
        fclose($handle);

        $start_date = '2022-01-01';
        $end_date = date('Y-m-d');

        $filtered_data = array_filter($data, function ($medicine) use ($start_date, $end_date) {
            return ($medicine['purchase_date'] >= $start_date && $medicine['purchase_date'] <= $end_date);
        });

        $medicine_totals = [];

        foreach ($filtered_data as $medicine) {
            if (isset($medicine_totals[$medicine['medicine_name']])) {
                $medicine_totals[$medicine['medicine_name']] += $medicine['quantity'];
            } else {
                $medicine_totals[$medicine['medicine_name']] = $medicine['quantity'];
            }
        }

        arsort($medicine_totals);

        $predicted_medicines = [];

        for ($i = $start_date; $i <= $end_date; $i = date('Y-m-d', strtotime($i . ' +1 month'))) {
            $month_medicines = [];

            foreach ($data as $medicine) {
                if ($medicine['purchase_date'] >= $i && $medicine['purchase_date'] < date('Y-m-d', strtotime($i . ' +1 month'))) {
                    $month_medicines[$medicine['medicine_name']] = $medicine['quantity'];
                }
            }

            $predicted_medicines[$i] = $month_medicines;
        }

        // dd($predicted_medicines);
        return $predicted_medicines;
    }

    public function render()
    {
        // first bar graph
        $medicines = MedicineInventory::where('exp_date', '<=', Carbon::now()->addMonth())->get();
        $data = array();
        foreach ($medicines as $medicine) {
            $data[] = array(
                'name' => $medicine->med_name,
                'data' => array(
                    array(
                        'x' => $medicine->exp_date,
                        'y' => (int) $medicine->med_quantity,
                    ),
                ),
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

        // timeline (third graph)
        // Perform Holt-Winters method on each product
        $timeline = [];
        foreach ($this->dataset as $date => $values) {
            foreach ($values as $product => $value) {
                if (!isset($timeline[$product])) {
                    $timeline[$product] = [
                        'name' => $product,
                        'data' => [],
                    ];
                }
                $timeline[$product]['data'][] = [
                    strtotime($date) * 1000,
                    $value,
                ];
            }
        }

        // second graph
        // dd($this->forecast());
        $dataForecast = $this->forecast();

        $categoriesForecast = [];
        $seriesForecast = [];

        foreach ($dataForecast as $date => $medicines) {
            $categoriesForecast[] = $date;

            foreach ($medicines as $medicine => $quantity) {
                if (!isset($seriesForecast[$medicine])) {
                    $seriesForecast[$medicine] = [
                        'name' => $medicine,
                        'data' => [],
                    ];
                }

                $seriesForecast[$medicine]['data'][] = $quantity;
            }
        }

        // dd($categoriesForecast, $seriesForecast);

        return view('livewire.forecasting.index-show', compact('data', 'categories', 'timeline', 'seriesForecast', 'categoriesForecast'));
    }
}
