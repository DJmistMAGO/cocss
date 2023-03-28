<?php

namespace App\Http\Livewire\Annoucement;

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


    protected $listeners = ['delete'];

    protected $rules = [
        'subject' => 'required',
        'date' => 'required',
        'time' => 'required',
        'what' => 'nullable',
        'where' => 'nullable',
    ];

    public function resetInputFields()
    {
        $this->subject = '';
        $this->date = '';
        $this->time = '';
        $this->what = '';
        $this->where = '';
    }

    public function store()
    {
        $validated = $this->validate([
            'subject' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'what' => 'nullable|string|max:255',
            'where' => 'nullable|string|max:255',
        ]);

        Announcement::create([
            'subject' => $validated['subject'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'what' => $validated['what'],
            'where' => $validated['where'],
        ]);

        $this->resetInputFields();
        $this->emit('hideModal', '#create');

        $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully created your announcement']);
    }

    public function render()
    {
        $announcements = Announcement::all();

        return view('livewire.annoucement.index-show', compact('announcements'));
    }

    public function edit($id)
    {
        $announcement = Announcement::find($id);

        $this->announcement_id = $announcement->id;
        $this->subject = $announcement->subject;
        $this->date = $announcement->date->format('Y-m-d');
        $this->time = $announcement->time->format('H:i');
        $this->what = $announcement->what;
        $this->where = $announcement->where;

        // dd($this->time);

        $this->emit('showModal', '#edit');
    }

    //update
    public function update()
    {
        $validated = $this->validate([
            'subject' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'what' => 'nullable|string|max:255',
            'where' => 'nullable|string|max:255',
        ]);

        if ($this->announcement_id) {
            $announcement = Announcement::find($this->announcement_id);
            $announcement->update([
                'subject' => $validated['subject'],
                'date' => $validated['date'],
                'time' => $validated['time'],
                'what' => $validated['what'],
                'where' => $validated['where'],
            ]);

            $this->resetInputFields();
            $this->emit('hideModal', '#edit');

            $this->dispatchBrowserEvent('swalSuccess', ['message' => 'You have successfully updated your announcement']);
        }
    }

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

    //delete
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $id,
            'message' => 'Are you sure?'
        ]);
    }

    public function delete($id)
    {
        $rcrd = Announcement::where('id', $id)->first();
        if ($rcrd != null) {
            $rcrd->delete();
        }
    }
}
