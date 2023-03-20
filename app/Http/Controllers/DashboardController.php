<?php

namespace App\Http\Controllers;

use App\Models\MedicineInventory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $medicines = MedicineInventory::all();

        $data = array();
        $categories = array();

        foreach ($medicines as $medicine) {
            $categories[] = $medicine->med_name;
            $data[] = array(
                'name' => $medicine->med_name,
                'data' => array((int)$medicine->med_quantity)
            );
        }


        return view('modules.dashboard', compact('categories', 'data'));
    }
}
