<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAppointment extends Model
{
    use HasFactory;

    protected $casts = [
        'appointment_date' => 'date',
    ];

    protected $fillable = [
        'user_id',
        'appointment_date',
        'appointment_time',
        'reason',
        'status',
    ];

    //get user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
