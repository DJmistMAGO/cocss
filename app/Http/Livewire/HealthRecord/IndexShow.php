<?php

namespace App\Http\Livewire\HealthRecord;

use App\Models\HealthRecord;
use Livewire\Component;

class IndexShow extends Component
{
    public function render()
    {
        $hrs = HealthRecord::where('user_id', auth()->user()->id)->get();
        return view('livewire.health-record.index-show', compact('hrs'));
    }
}
