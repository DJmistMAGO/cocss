<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MedicineInventory;

class ForecastingController extends Controller
{
    public function index()
    {
        return view('modules.forecasting.index');
    }
}
