<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_appointment_id',
        'results'
    ];

    public function book_appointment()
    {
        return $this->belongsTo(BookAppointment::class);
    }

    public function medicine()
    {
        return $this->hasMany(AppointmentMedicine::class);
    }
}
