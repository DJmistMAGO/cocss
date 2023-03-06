<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    public function index()
    {
        return view('modules.health-record.index');
    }
}
