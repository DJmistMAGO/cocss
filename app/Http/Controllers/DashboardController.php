<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\MedicineInventory;

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

        // $dateNow = date('Y-m-d');

        // $announcements = Announcement::where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->get();


        return view('modules.dashboard', compact('categories', 'data'));
    }
}
