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
        $medicines = MedicineInventory::all();

        return view('modules.medicine-inv.index', compact('medicines'));
    }
}
