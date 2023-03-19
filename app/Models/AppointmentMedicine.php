<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentMedicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'medicine_name',
        'med_quantity',
        'med_time',
    ];
}
