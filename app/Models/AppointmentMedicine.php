<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentMedicine extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    public function medicine()
    {
        return $this->belongsTo(MedicineInventory::class, 'medicine_id');
    }
}
