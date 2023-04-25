<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MedicineInventory;
use Phpml\Regression\LeastSquares;

class MedicineInvController extends Controller
{
    public function index()
    {
        // $medicines = MedicineInventory::where('exp_date', '<=', Carbon::now()->addMonth())->get();
        // // dd($medicines);

        // $data = array();
        // $categories = array();

        // foreach ($medicines as $medicine) {
        //     $categories[] = $medicine->med_name;
        //     $data[] = array(
        //         'name' => $medicine->med_name,
        //         'data' => array((int)$medicine->med_quantity)
        //     );
        // }


        return view('modules.forecasting.index');
    }

    // public function regression()
    // {
    //     // I want the exp_date, med_name, and quantity to be the data for regression analysis
    //     $medInv = MedicineInventory::select('exp_date', 'med_name', 'med_quantity')->get();

    //     // use medInv to get the data for regression analysis
    //     $data = $medInv->toArray();

    //     // preprocess the data
    //     $samples = [];
    //     $targets = [];

    //     foreach ($data as $key => $value) {
    //         $samples[] = [Carbon::parse($value['exp_date'])->timestamp];
    //         $targets[] = $value['med_quantity'];
    //     }

    //     // split data into training and testing sets
    //     $trainingSamples = array_slice($samples, 0, 3);
    //     $trainingTargets = array_slice($targets, 0, 3);

    //     // train the model
    //     $regression = new LeastSquares();
    //     $regression->train($trainingSamples, $trainingTargets);

    //     // predict the medicine for next month from now
    //     $predictedMedicine = $regression->predict([Carbon::now()->addMonth()->timestamp]);

    //     return response()->json([
    //         'predicted_medicine' => $predictedMedicine
    //     ]);
    // }
}
