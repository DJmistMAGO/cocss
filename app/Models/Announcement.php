<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'date',
        'time',
        'what',
        'where',
    ];

    protected $dates = [
        'date' => 'date',
        'time' => 'time',
    ];
}
