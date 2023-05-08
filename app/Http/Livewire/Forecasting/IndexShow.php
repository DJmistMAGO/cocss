<?php

namespace App\Http\Livewire\Forecasting;

use App\Models\AppointmentMedicine;
use App\Models\MedicineInventory;
use Carbon\Carbon;
use Livewire\Component;

class IndexShow extends Component
{

    public function predict()
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

        $appMed = AppointmentMedicine::with('medicine')->get();

        $appMedData = array();
        foreach ($appMed as $app) {
            $appMedData[] = array(
                'medicine_name' => $app->medicine->med_name,
                'quantity' => (int) $app->med_quantity,
                'purchase_date' => $app->created_at->format('Y-m-d'),
            );
        }

        $mergedData = array_merge($data, $appMedData);

        $start_date = '2021-01-01';
        $end_date = date('Y-m-d');

        //use regression method to forecast what medicine to buy the next month based from historical data in $mergedData
        $forecast = array();
        foreach ($mergedData as $data) {
            if (!isset($forecast[$data['medicine_name']])) {
                $forecast[$data['medicine_name']] = array();
            }

            $forecast[$data['medicine_name']][$data['purchase_date']] = $data['quantity'];
        }

        $forecastData = array();
        foreach ($forecast as $medicine => $values) {
            $forecastData[$medicine] = $this->forecast($values, $start_date, $end_date);
        }

        return $forecastData;
    }

    public function forecast($values, $start_date, $end_date)
    {
        $start_date = strtotime($start_date);
        $end_date = strtotime($end_date);

        $data = array();
        foreach ($values as $date => $value) {
            $data[] = array(
                'x' => strtotime($date),
                'y' => $value,
            );
        }

        $data = array_reverse($data);

        $forecast = array();
        $forecast['data'] = array();
        $forecast['start_date'] = $start_date;
        $forecast['end_date'] = $end_date;

        $forecast['data'] = $this->holtWinters($data, 12, 0.1, 0.1, 0.1, 0.1, 0.1);

        return $forecast;
    }

    public function holtWinters($data, $seasonLength, $alpha, $beta, $gamma, $initialLevel, $initialTrend)
    {
        $n = count($data);
        $result = array();

        // Initialize level, trend and seasonal components
        $seasonals = array_fill(0, $seasonLength, 0);
        $seasonalIndices = array();
        for ($i = 0; $i < $n; $i++) {
            $seasonalIndices[$i] = $i % $seasonLength;
            $seasonals[$seasonalIndices[$i]] += $data[$i]['y'];
        }
        $seasonals = array_map(function ($seasonal) use ($seasonLength) {
            return $seasonal / $seasonLength;
        }, $seasonals);
        $levels = array_fill(0, $seasonLength, $initialLevel);
        $trends = array_fill(0, $seasonLength, $initialTrend);

        // Apply Holt-Winters method
        for ($i = 0; $i < $n; $i++) {
            $value = $data[$i]['y'];
            $seasonal = $seasonals[$seasonalIndices[$i]];
            $level = $levels[$i % $seasonLength];
            $trend = $trends[$i % $seasonLength];

            // Calculate forecasts
            $lastLevel = $level;
            $level = $alpha * ($value - $seasonal) + (1 - $alpha) * ($level + $trend);
            $trend = $beta * ($level - $lastLevel) + (1 - $beta) * $trend;
            $seasonal = $gamma * ($value - $level) + (1 - $gamma) * $seasonal;
            $seasonals[$seasonalIndices[$i]] = $seasonal;
            $levels[$i % $seasonLength] = $level;
            $trends[$i % $seasonLength] = $trend;

            // Save forecast
            if ($data[$i]['x'] >= $data[0]['x']) {
                $result[] = array(
                    'x' => $data[$i]['x'],
                    'y' => $level + $trend + $seasonals[$seasonalIndices[$i % $seasonLength]],
                );
            }
        }

        return $result;
    }

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

    public function getAppointmentMedicine()
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

        $appMed = AppointmentMedicine::with('medicine')->get();

        $appMedData = array();
        foreach ($appMed as $app) {
            $appMedData[] = array(
                'medicine_name' => $app->medicine->med_name,
                'quantity' => (int) $app->med_quantity,
                'purchase_date' => $app->created_at->format('Y-m-d'),
            );
        }

        $mergedData = array_merge($data, $appMedData);

        // filter $appMedData by date using the purchase_date column and combine all the medicine in an array with the same year and month
        $filtered = array();
        foreach ($mergedData as $data) {
            if (!isset($filtered[$data['purchase_date']])) {
                $filtered[$data['purchase_date']] = array();
            }

            $filtered[$data['purchase_date']][$data['medicine_name']] = $data['quantity'];
        }

        return $filtered;
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
        // dd($this->getAppointmentMedicine());

        $filteredData = $this->getAppointmentMedicine();

        $timeline = [];

        foreach ($filteredData as $date => $medicines) {
            foreach ($medicines as $medicine => $quantity) {
                if (!isset($timeline[$medicine])) {
                    $timeline[$medicine] = [
                        'name' => $medicine,
                        'data' => [],
                    ];
                }
                $timeline[$medicine]['data'][] = [
                    strtotime($date) * 1000,
                    $quantity,
                ];
            }
        }

        // return array_values($timeline);
        $timeline = array_values($timeline);

        // second graph
        $seriesForecast = [];
        $categoriesForecast = [];
        foreach ($this->predict() as $medicine => $values) {
            $seriesForecast[] = [
                'name' => $medicine,
                'data' => $values['data'],
            ];
            foreach ($values['data'] as $datapoint) {
                $categoriesForecast[] = $datapoint['x'];
            }
        }
        $categoriesForecast = array_unique($categoriesForecast);
        sort($categoriesForecast);

        $prediction = $this->predict();
        // dd($prediction);

        return view('livewire.forecasting.index-show', compact('data', 'categories', 'timeline', 'seriesForecast', 'categoriesForecast', 'prediction'));
    }
}
