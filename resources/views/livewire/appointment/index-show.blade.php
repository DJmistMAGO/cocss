<div>
    @include('livewire.appointment.view')
    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#view_app"
        wire:click="view({{ $appointment->id }})">View</button>
</div>
