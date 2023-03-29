<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class IndexShow extends Component
{
    public function render()
    { 
        $users = User::orderBy('id', 'asc')->get();

        return view('livewire.users.index-show' , compact('users'));
    }
}
