<?php

namespace App\Http\Livewire\Announce;

use Livewire\Component;
use App\Models\Announcement;

class IndexShow extends Component
{
    public $subject;
    public $date;
    public $time;
    public $what;
    public $where;
    public $announcement_id;

    //view
    public function view($id)
    {
        $announcement = Announcement::find($id);

        $this->subject = $announcement->subject;
        $this->date = $announcement->date->format('Y-m-d');
        $this->time = $announcement->time->format('H:i');
        $this->what = $announcement->what;
        $this->where = $announcement->where;

        $this->emit('showModal', '#view');
    }

    public function render()
    {
        $dateNow = date('Y-m-d');

        $announcements = Announcement::where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->get();

        return view('livewire.announce.index-show', compact('announcements'));
    }
}
