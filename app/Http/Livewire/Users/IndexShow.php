<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class IndexShow extends Component
{
    public $school_id;
    public $user_name;
    public $name;
    public $sorsu_email;
    public $phone_no;
    public $bdate;

    public function render()
    {
        $users = User::orderBy('id', 'asc')->get();

        return view('livewire.users.index-show' , compact('users'));
    }

    public function view($id)
    {
        $user = User::find($id);

        // dd($user);

        $this->school_id = $user->school_id;
        $this->user_name = $user->user_name;
        $this->name = $user->name;
        $this->sorsu_email = $user->sorsu_email;
        $this->phone_no = $user->phone_no;
        $this->bdate = $user->bdate->format('Y-m-d');

        // dd($this->bdate);

        $this->emit('showModal', '#viewUser');
    }
}
