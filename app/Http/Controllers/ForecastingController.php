<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForecastingController extends Controller
{
    public function index() {
        return view('modules.forecasting.index');
    }
}
