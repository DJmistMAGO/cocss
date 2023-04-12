<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'med_name',
        'exp_date',
        'med_description',
        'med_quantity',
    ];

    protected $casts = [
        'exp_date' => 'date',
    ];

    protected $dates = [
        'exp_date',
    ];
}
